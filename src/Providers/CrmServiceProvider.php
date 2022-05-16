<?php

namespace Intuix\Crm\Providers;

use Illuminate\Support\ServiceProvider;

class CrmServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        //$this->publishes([__DIR__ . '/../../config/cw_crm.php' => config_path('cw_crm.php')], 'config');
        //$this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'crm');
    }

    public function register()
    {
        
    }
}
