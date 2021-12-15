<?php

namespace App\Providers;

use App\Helpers\GuestHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 

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
        Schema::defaultStringLength(191);

        view()->composer('*',function($view){
            $view->with([
                'web_source' => url('/').env('RESOURCE_URL'),
                'admin_assets' => url('/').env('RESOURCE_URL').'/admin',
            ]);
        });

        
        // new GuestHelper;
        // Schema::defaultStringLength("125");
        // view()->composer('*',function($view){
        //     $view->with([
        //         "logo_image" => my_asset("logo.png"),
        //         "logo_text_image" => my_asset("logo_text.png"),
        //         "logo_icon_image" => my_asset("logo_icon.png"),
        //         'web_assets' => url('/').env('RESOURCE_URL').'/web',
        //         'admin_assets' => url('/').env('RESOURCE_URL').'/admin',
        //     ]);
        // });

     }
}


