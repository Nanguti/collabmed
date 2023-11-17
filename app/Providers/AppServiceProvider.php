<?php

namespace App\Providers;

use App\Repositories\Organization\OrganizationInterface;
use App\Repositories\Organization\OrganizationRepository;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\Todo\TodoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TodoInterface::class, function () {
            return new TodoRepository();
        });

        $this->app->bind(OrganizationInterface::class, function () {
            return new OrganizationRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
