<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\ProductType;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $product_typeASP = ProductType::all();
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
            }
            //$view->with('product_typeASP',$product_typeASP);
            // $view->with(['product_typeASP',$product_typeASP,'cart'=>Session::get('cart'),
            //             'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,
            //             'totalQty'=>$cart->totalQty]);
        });
    }
}
