<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\ProductType;
use App\Models\Cart;
use Session;
use Illuminate\Pagination\Paginator;

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
            $view->with('product_typeASP',$product_typeASP);
        });
        
        view()->composer(['header','page.dathang'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);

                $view->with(['cart'=>Session::get('cart'),
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
            }
        });

        view()->composer('header',function($view){
            $apiKey = '8bb3edc19c60226b99e56655963d397a';
            $cityId = '1586203';
            $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?id='.$cityId.'&appid='.$apiKey;

            $info_json = file_get_contents($apiUrl);
            
            
            $data = json_decode($info_json,true);

            $cur_day = date("d/m/Y");
            
            $view->with(['data'=>$data,
                        'day'=>$cur_day]);
        });

        Paginator::useBootstrap();
    }
}
