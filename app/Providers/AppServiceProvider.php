<?php

namespace App\Providers;

use App\Domain\Admin\AdminRepository;
use Illuminate\Support\ServiceProvider;
use App\Domain\Product\ProductRepository;
use App\Infrastructure\Persistence\Eloquent\Admin\EloquentAdminRepository;
use App\Infrastructure\Persistence\Eloquent\Product\EloquentProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepository::class, EloquentAdminRepository::class);
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
