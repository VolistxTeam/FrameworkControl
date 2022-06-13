<?php

namespace Volistx\FrameworkControl;

use Illuminate\Support\ServiceProvider;

class FrameworkControlServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('frameworkcontrol', function ($app) {
            return new FrameworkControl(
                $app['config']->get('frameworkcontrol.url'),
                $app['config']->get('frameworkcontrol.secret_key')
            );
        });
    }

    public function boot()
    {
        //
    }
}
