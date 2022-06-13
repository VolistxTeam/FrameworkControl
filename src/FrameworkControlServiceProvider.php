<?php

namespace Volistx\FrameworkControl;

use Illuminate\Support\ServiceProvider;
use Volistx\FrameworkControl\Helpers\RequestsCenter;

class FrameworkControlServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Requests', function () {
            return new RequestsCenter();
        });
    }

    public function boot()
    {
        //
    }
}
