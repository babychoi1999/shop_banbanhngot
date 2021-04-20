<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\productType;

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
        view()->composer('layout.header',function($view){ // Truyền function qua view header
            $loai_sp = productType::all();
            $view->with('loai_sp',$loai_sp);// truyền biến $loai_sp qua view header
        });
    }
}
