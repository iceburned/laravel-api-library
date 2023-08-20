<?php

namespace App\Providers;

use App\Interfaces\AuthorReadInterface;
use App\Interfaces\AuthorWriteInterface;
use App\Interfaces\BookReadInterface;
use App\Interfaces\BookWriteInterface;
use App\Interfaces\UserReadInterface;
use App\Interfaces\UserWriteInterface;
use App\Repositories\AuthorReadRepository;
use App\Repositories\AuthorWriteRepository;
use App\Repositories\BookReadRepository;
use App\Repositories\BookWriteRepository;
use App\Repositories\UserReadRepository;
use App\Repositories\UserWriteRepository;
use App\Services\AuthorReadService;
use App\Services\AuthorWriteService;
use App\Services\BookReadService;
use App\Services\BookWriteService;
use App\Services\UserReadService;
use App\Services\UserWriteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserReadInterface::class, UserReadRepository::class);
        $this->app->bind(UserWriteInterface::class, UserWriteRepository::class);
        $this->app->bind(BookReadInterface::class, BookReadRepository::class);
        $this->app->bind(BookWriteInterface::class, BookWriteRepository::class);
        $this->app->bind(AuthorReadInterface::class, AuthorReadRepository::class);
        $this->app->bind(AuthorWriteInterface::class, AuthorWriteRepository::class);
//
//        $this->app->bind(UserReadInterface::class, UserReadService::class);
//        $this->app->bind(UserWriteInterface::class, UserWriteService::class);
//        $this->app->bind(BookReadInterface::class, BookReadService::class);
//        $this->app->bind(BookWriteInterface::class, BookWriteService::class);
//        $this->app->bind(AuthorReadInterface::class, AuthorReadService::class);
//        $this->app->bind(AuthorWriteInterface::class, AuthorWriteService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
