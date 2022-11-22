<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('panel.blocks.auth', static function (\Illuminate\View\View $view) {
            $view->with([
                'user'    => auth()->user(),
                'reviews' => Review::where('activity', 0)
                    ->with('product:id,title')
                    ->oldest('id')
                    ->get(),
                'orders'  => Order::whereIn('status', [Order::STATUS['NEW'], Order::STATUS['PENDING']])
                    ->with('user:id,name')
                    ->oldest('id')
                    ->get()
            ]);
        });

        View::composer('layouts.cabinet', static function (\Illuminate\View\View $view) {
            $view->with(['user' => auth()->user()]);
        });
    }
}
