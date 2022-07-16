<?php

namespace B2B\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DecalexServiceProvider extends ServiceProvider
{

    public function boot() {

        Route::middleware('web')->group(function () {
            /** System Routes */
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/home.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/get-config.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/set-locale.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/user-session.php');

            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/configs.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/countries.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/database.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/validation.php');

            /**  Cartalyst Routes */
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/cartalyst/permissions.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/cartalyst/roles.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/cartalyst/users.php');
        });


        
    }
}