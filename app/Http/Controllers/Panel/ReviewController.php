<?php

namespace App\Http\Controllers\Panel;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ReviewController extends Controller
{
    public function index()
    {
        $mod_reviews = Review::where('activity', 0)
            ->with(['user:id,name', 'product:id,title'])
            ->oldest('id')
            ->get();

        $reviews = Review::where('activity', 1)
            ->with(['user:id,name', 'product:id,title'])
            ->latest('id')
            ->paginate(10);

        return view('panel.reviews.index', compact('mod_reviews', 'reviews'));
    }

    public function edit(Review $review)
    {
        $review->load([
            'user',
            'product' => fn($query) => $query->withCount(['reviews' => fn($query) => $query->where('activity', 1)])
        ]);

        return view('panel.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $this->validate($request, [
            'activity' => ['required', 'integer', Rule::in(Review::STATUS)]
        ]);

        $review->update(['activity' => $request['activity']]);
        $this->generateRating($review);

        session()->flash('flash', ['message' => 'Статус отзыва обновлён']);

        return response()->json(['redirect' => route('panel.reviews.edit', $review)]);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        $this->generateRating($review);

        session()->flash('flash', ['message' => 'Отзыв удалён']);

        return response()->json(['redirect' => route('panel.reviews.index')]);
    }

    public function search(Request $request)
    {
        $reviews = Review::whereHas(
            'product',
            static fn($q) => $q->where('title', 'like', "%{$request['token']}%")
        )->orWhereHas('user', static fn($q) => $q->where('name', 'like', "%{$request['token']}%"))
            ->with(['user:id,name', 'product:id,title'])
            ->latest('id')
            ->take(30)
            ->get();

        if ($reviews->isEmpty()) {
            return 'Ничего не найдено';
        }

        return View::make('panel.reviews.table', compact('reviews'))->render();
    }

    protected function generateRating(Review $review)
    {
        return $review->product->update([
            'rating' => $review
                ->product
                ->loadAvg(['reviews' => fn($q) => $q->where('activity', 1)], 'rating')
                ->reviews_avg_rating ?: 0
        ]);
    }
}
