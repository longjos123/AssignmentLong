<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
    }
    public $bindings = [
        \App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\TourRepository::class,

        \App\Repositories\Contracts\RepositoryInterface\TransportRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\TransportRepository::class,

        \App\Repositories\Contracts\RepositoryInterface\CountriesRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\CountriesRepository::class,

        \App\Repositories\Contracts\RepositoryInterface\HotelRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\HotelRepository::class,

        \App\Repositories\Contracts\RepositoryInterface\NewsRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\NewsRepository::class,

        \App\Repositories\Contracts\RepositoryInterface\UserTourRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\UserTourRepository::class,

        \App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface::class
        => \App\Repositories\Contracts\Repository\UserRepository::class,
    ];


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
