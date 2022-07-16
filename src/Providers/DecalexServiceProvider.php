<?php

namespace ComptechSoft\Decalex\Providers;

use Illuminate\Support\ServiceProvider;

class DecalexServiceProvider extends ServiceProvider
{

    public function boot() {

        /**
         * ROUTES
         */
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/home.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/get-config.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/set-locale.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/user-session.php');

    }
}