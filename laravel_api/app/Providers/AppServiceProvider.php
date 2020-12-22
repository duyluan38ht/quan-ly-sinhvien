<?php

namespace App\Providers;

use App\Http\Repositories\Impl\StudentRepositoryImpl;
use App\Http\Repositories\StudentRepository;
use App\Http\Servcies\Impl\StudentServiceImpl;
use App\Http\Servcies\StudentService;
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
        $this->app->singleton(
            StudentRepository::class,
            StudentRepositoryImpl::class
        );
        $this->app->singleton(
            StudentService::class,
            StudentServiceImpl::class
        );
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
