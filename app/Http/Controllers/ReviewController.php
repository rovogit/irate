<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewController extends Controller
{
    public function resolve($category1, $category2 = null, $product = null)
    {
        if (null !== $product) {
            return $this->product($category1, $category2, $product);
        }

        if (null !== $category2) {
            return $this->second($category1, $category2);
        }

        return $this->first($category1);
    }

    public function show(Review $review)
    {
        $review->load([
            'user'    => static fn($q) => $q->withCount(['reviews', 'comments', 'products']),
            'product' => static fn($q) => $q->withCount('reviews'),
            'comments' => static fn($q) => $q->with('user')->latest('id')
        ]);

        $review->loadCount('likes');

        return view('reviews.show', compact('review'));
    }

    public function store(Product $product, ReviewRequest $request)
    {
        $product->reviews()->create([
            'user_id'  => auth()->id(),
            'rating'   => $request['rating'],
            'body'     => clean($request['body'], 'youtube'),
            'activity' => Review::STATUS['MODERATION']
        ]);

        return response()->json(['response' => 'OK']);
    }

    public function like(Review $review, Request $request)
    {
        return $request['act'] ? $review->like() : $review->unlike();
    }

    protected function product(string $category1, string $category2, string $product_slug)
    {
        /** @var Product $product */
        $product = Product::where('slug', $product_slug)
            ->with('category')
            ->firstOrFail();

        if ($category2 !== $product->category->slug || $category1 !== $product->category->parent->slug) {
            /** @noinspection PhpParamsInspection */
            throw (new ModelNotFoundException)->setModel(Product::class);
        }

        $product->load(['photos', 'values']);
        $product
            ->load(['reviews' => static fn($q) => $q->with('user')->where('activity', 1)->latest('id')])
            ->loadCount(['reviews' => static fn($q) => $q->where('activity', 1)]);

        return view('products.show', compact('product'));
    }

    protected function second(string $category1, string $category2)
    {
        /** @var Category $category */
        $category = Category::where('slug', $category2)
            ->with('parent')
            ->firstOrFail();

        if ($category1 !== $category->parent->slug) {
            /** @noinspection PhpParamsInspection */
            throw (new ModelNotFoundException)->setModel(Category::class);
        }

        $products = $category->products()
            ->withCount(['reviews' => static fn($q) => $q->where('activity', 1)])
            ->latest('id')
            ->paginate(8);

        return view('categories.second', compact('category', 'products'));
    }

    protected function first(string $category1)
    {
        $category = Category::where('slug', $category1)
            ->with('children')
            ->firstOrFail();

        return view('categories.first', compact('category'));
    }
}
