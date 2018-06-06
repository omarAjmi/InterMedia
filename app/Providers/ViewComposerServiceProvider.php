<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
                            'welcome',
                            'layouts.public',
                            'users.profile',
                            'users.orders',
                            'orders.new',
                            'orders.discussion',
                            'orders.preview'
                        ], 'App\Http\ViewComposers\AuthUnseenMessagesViewComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
