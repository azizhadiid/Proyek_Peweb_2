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
        View::composer('templates.mainLayoutUser', function ($view) {
            $user = Auth::user();

            $likeCount = 0;
            $cartItemCount = 0;

            if ($user) {
                // Jumlah wishlist (likes)
                $likeCount = Like::where('user_id', $user->id)->count();

                // Jumlah total quantity dari cart items milik user
                $cart = Cart::where('user_id', $user->id)->first();
                if ($cart) {
                    $cartItemCount = CartItem::where('cart_id', $cart->id)->sum('quantity');
                }
            }

            $view->with('likeCount', $likeCount)->with('cartItemCount', $cartItemCount);
        });
    }
}
