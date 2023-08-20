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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
