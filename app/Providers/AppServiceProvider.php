<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrapFive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('website.layouts.footer', function ($view) {
            $view->with('footerServices', Service::active()->orderBy('created_at', 'desc')->take(6)->get());
            $view->with('footerBlogs', Blog::active()->latest()->take(5)->get());
        });
    }
}
