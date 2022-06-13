<?php

namespace Volistx\FrameworkControl;

use Illuminate\Support\ServiceProvider;
use Volistx\FrameworkControl\Helpers\RequestHelper;

class FrameworkControlServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Requests', function () {
            return new RequestHelper();
        });
    }

    public function boot()
    {
        //
    }
}
