<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Like;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View Composer untuk mainLayoutUser blade
        View::composer('templates.mainTemplatedUser', function ($view) {
            $likesCount = 0;
            $cartItemsCount = 0;

            if (Auth::check()) {
                $user = Auth::user();

                // Hitung jumlah likes user
                $likesCount = Like::where('user_id', $user->id)->count();

                // Hitung jumlah cart items user
                $cart = Cart::where('user_id', $user->id)->first();
                if ($cart) {
                    $cartItemsCount = CartItem::where('cart_id', $cart->id)
                        ->sum('quantity'); // Menggunakan sum quantity
                }
            }

            $view->with([
                'likesCount' => $likesCount,
                'cartItemsCount' => $cartItemsCount
            ]);
        });
    }
}
