<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

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
        //
     $path = 'public/website/';
     $path2 = 'public/website/Reviews/';
     $admin_path = 'public/admin/';
     $uploaded_img_path = 'public/uploaded/';

     //css files
     View::share('css_path',$path.'css');
     View::share('Reviews_css_path',$path2.'css');
     //jave_script files
     View::share('js_path',$path.'js');
     View::share('Reviews_js_path',$path2.'js');
     //website images
     View::share('img_path',$path.'images');
     //============================================================================
     //admin files
     View::share('css_admin_path',$admin_path.'css');
     View::share('first_analyting_product',0);
     View::share('Lib_admin_path',$admin_path.'lib');
     
     //jave_script files
     View::share('js_admin_path',$admin_path.'js');
     
     //website images
     View::share('img_admin_path',$admin_path.'img');
      View::share('slidingimages_admin_path',$admin_path.'slidingImages');
      //=============================================================================
     View::share('uploaded_img_path',$uploaded_img_path);
     //=============================================
        View::share('avatars_path','public/generated_avaters');




    }
}
