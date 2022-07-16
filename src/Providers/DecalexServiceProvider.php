<?php

namespace ComptechSoft\Decalex\Providers;

use Illuminate\Support\ServiceProvider;

class DecalexServiceProvider extends ServiceProvider
{

    public function boot() {

        $this->loadRoutesFrom(__DIR__ . '/../Routes/web/system/home.php');

    }
}