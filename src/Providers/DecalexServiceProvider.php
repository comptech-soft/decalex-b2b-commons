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

            /**  Decalex Routes */
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/categorii.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/centralizatoare.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/chestionare.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/contracts.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-centralizatoare.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-chestionare.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-cursuri.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-departamente.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-folders.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-notifications.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-persons.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-registers.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers-services.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/customers.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/educatie.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/educatie.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/email-templates.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/notifications.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/planning.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/rapoarte.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/registre.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/services.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/static-pages.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/tasks.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/team-customers.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/team.php');
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web/decalex/trimiteri.php');

        });


        
    }
}