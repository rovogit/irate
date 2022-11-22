<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = $request->user()
            ->products()
            ->with(['category' => fn($query) => $query->with('parent')])
            ->withCount('reviews')
            ->withCount('values')
            ->withCount('photos')
            ->paginate(10);

        return view('cabinet.products.index', compact('products'));
    }

    public function edit(Product $product)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->authorize('update', $product);

        return view('cabinet.products.edit', compact('product'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->authorize('update', $product);

        $product->update($request->safe()->all());

        session()->flash('flash', ['message' => 'Продукт обновлен']);

        return response()->json(['redirect' => route('cabinet.products.edit', $product)]);
    }
}