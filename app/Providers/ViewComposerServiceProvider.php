<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(){
        // Using class based composers...
        view()->composer(
            ["admin/inc/user-panel", "admin/inc/main-nav"],
            'App\Http\ViewComposers\LoggedInUserComposer'
        );

        // Using Closure based composers...
//        view()->composer('admin/inc/user-panel', function ($view) {
//            'profile', 'App\Http\ViewComposers\LoggedInUserComposer'
//        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){
        //
    }
}
