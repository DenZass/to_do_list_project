<?php

namespace App\Providers;

use App\Services\Task\TaskService;
use App\Services\Task\TaskServiceClass;
use App\Services\TaskStatus\TaskStatusService;
use App\Services\TaskStatus\TaskStatusServiceClass;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskStatusService::class, function (){
            return new TaskStatusServiceClass();
        });
        $this->app->bind(TaskService::class, function (){
            return new TaskServiceClass();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
