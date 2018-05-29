<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

use App\Category;
use App\Post;
use App\Tax;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('templates.header', function($view)
        {
            $view->with('DataTopMenu', Category::GetCategoryMenu());
        });
       view()->composer('templates.footer', function($view)
        {
            $view->with('DataFooter', Post::GetDataFooter());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $TaxVat = 10;
        $Vat =  Tax::GetVat();
        if (!empty($Vat)) {
            $TaxVat = $Vat;
        }
        $config = app('config');
        $config->set('TaxVat',$TaxVat);
        
    }
}
