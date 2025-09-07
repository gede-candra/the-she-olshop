<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryImplement;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryImplement;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryImplement;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImplement;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceImplement;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceImplement;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceImplement;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceImplement;
use App\Services\User\UserService;
use App\Services\User\UserServiceImplement;
use Carbon\Carbon;
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
        // Auth
        $this->app->bind(AuthService::class, AuthServiceImplement::class);
        // User
        $this->app->bind(UserRepository::class, UserRepositoryImplement::class);
        $this->app->bind(UserService::class, UserServiceImplement::class);
        // Product
        $this->app->bind(ProductRepository::class, ProductRepositoryImplement::class);
        $this->app->bind(ProductService::class, ProductServiceImplement::class);
        // Order
        $this->app->bind(OrderRepository::class, OrderRepositoryImplement::class);
        $this->app->bind(OrderService::class, OrderServiceImplement::class);
        // Category
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImplement::class);
        $this->app->bind(CategoryService::class, CategoryServiceImplement::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Makassar');
        Carbon::setLocale('id');
    }
}
