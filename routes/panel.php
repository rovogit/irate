<?php

use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\IndexController;
use App\Http\Controllers\Panel\OrderController;
use App\Http\Controllers\Panel\ReviewController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\GalleryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\AttributeController;
use App\Http\Controllers\Panel\Blog\RubricController;
use App\Http\Controllers\Panel\Blog\ArticleController;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'reviews', 'as' => 'reviews.'], static function () {
    Route::get('/', [ReviewController::class, 'index'])->name('index');
    Route::get('/{review}/edit', [ReviewController::class, 'edit'])->name('edit');
    Route::post('/{review}/edit', [ReviewController::class, 'update'])->name('update');
    Route::post('/{review}/destroy', [ReviewController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'products', 'as' => 'products.'], static function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('store');

    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::post('/{product}/edit', [ProductController::class, 'update'])->name('update');
    Route::post('/{product}/edit/user', [ProductController::class, 'user'])->name('user');
    Route::post('/{product}/edit/premium', [ProductController::class, 'premium'])->name('premium');

    Route::post('/{product}/edit/attributes', [ProductController::class, 'updateAttributes'])
        ->name('update_attributes');

    Route::get('/{product}/edit/gallery', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/{product}/edit/gallery', [GalleryController::class, 'update'])->name('gallery.update');
});
Route::group(['prefix' => 'categories', 'as' => 'categories.'], static function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/create', [CategoryController::class, 'store'])->name('store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/{category}/edit', [CategoryController::class, 'update'])->name('update');

    Route::get('/{category}/edit/attributes', [AttributeController::class, 'show'])->name('attribute.show');
    Route::post('/{category}/edit/attributes', [AttributeController::class, 'store'])->name('attribute.store');
    Route::get('/{category}/edit/attributes/{attribute}/edit', [AttributeController::class, 'edit'])
        ->name('attribute.edit');

    Route::post('/{category}/edit/attributes/{attribute}/edit', [AttributeController::class, 'update'])
        ->name('attribute.update');
});
Route::group(['prefix' => 'blog', 'as' => 'blog.'], static function () {
    Route::group(['prefix' => 'rubrics', 'as' => 'rubrics.'], static function () {
        Route::get('/', [RubricController::class, 'index'])->name('index');
        Route::post('/create', [RubricController::class, 'store'])->name('store');
        Route::post('/{rubric}/edit', [RubricController::class, 'update'])->name('update');
        Route::post('/{rubric}/delete', [RubricController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'articles', 'as' => 'articles.'], static function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('/create', [ArticleController::class, 'create'])->name('create');
        Route::post('/create', [ArticleController::class, 'store'])->name('store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('edit');
        Route::post('/{article}/edit', [ArticleController::class, 'update'])->name('update');
        Route::post('/{article}/delete', [ArticleController::class, 'destroy'])->name('destroy');
    });
});
Route::group(['prefix' => 'users', 'as' => 'users.'], static function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::post('/{user}/edit', [UserController::class, 'update'])->name('update');
    Route::post('/{user}/balance', [UserController::class, 'balance'])->name('balance');
});
Route::group(['prefix' => 'orders', 'as' => 'orders.'], static function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('edit');
    Route::post('/{order}/edit', [OrderController::class, 'update'])->name('update');
});
Route::group(['prefix' => 'comments', 'as' => 'comments.'], static function () {
    Route::get('/', [CommentController::class, 'index'])->name('index');
    Route::post('/{comment}/destroy', [CommentController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'search', 'as' => 'search.'], static function () {
    Route::get('/reviews', [ReviewController::class, 'search'])->name('review');
    Route::get('/products', [ProductController::class, 'search'])->name('products');
    Route::get('/articles', [ArticleController::class, 'search'])->name('articles');
    Route::get('/users', [UserController::class, 'search'])->name('users');
    Route::get('/orders', [OrderController::class, 'search'])->name('orders');
    Route::get('/comments', [CommentController::class, 'search'])->name('comments');
});
