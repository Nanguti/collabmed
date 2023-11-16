<?php
namespace App\Repositories\Todo;

use App\Repositories\TodoInterface;
use App\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;


class TodoRepoServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TodoInterface::class, function () {
            return new TodoRepository();
        });
    }
}