<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\productType;

use App\Models\Cart;
use Session;

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
        view()->composer(['layout.header','admin.layout.sidebar'],function($view){ // Truyền function qua view header
            $loai_sp = productType::all();
           
            $view->with('loai_sp',$loai_sp);// truyền biến $loai_sp qua view header
        });

        view()->composer(['layout.header','pages.dat_hang'],function($view){
             if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }
}
