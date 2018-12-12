<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = [
            'Home',
            'Contact Us',
            'Product',
            'About us'
        ];
        // View::share('menu',$menu); 
       
        // View::composer('layout.header',function($view) use($menu){
        //     $view->with('menu',$menu);
        // });
        View::composer(['layout.header','pages.home'],function($view) use($menu){
            $view->with('menu',$menu);
        });
        View::composer('*',function($view) use($menu){
            $view->with('menu',$menu);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
