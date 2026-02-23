<?php


use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\ComingSoonController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\FacilitiesController;
use App\Http\Controllers\Website\FaqController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\IntegratedSystemController;
use App\Http\Controllers\Website\JobController;
use App\Http\Controllers\Website\MediaController;
use App\Http\Controllers\Website\ProductsController;
use App\Http\Controllers\Website\ProjectsController;
use App\Http\Controllers\Website\QualityController;
use App\Http\Controllers\Website\QuoteController;
use App\Http\Controllers\Website\ServicesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],

    function () {

        /* ====================================================================================================================
        ==========================================================  Website Routes ============================================ */

        if (config('site.coming_soon', false)) {
            Route::get('/', [ComingSoonController::class, 'index'])->name('home');
            Route::get('/preview', [HomeController::class, 'index'])->name('home.preview');
        } else {
            Route::get('/', [HomeController::class, 'index'])->name('home');
        }

        Route::get('/about', [AboutController::class, 'index'])->name('about');

        Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
        Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

        Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
        Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');

        Route::get('/services', [ServicesController::class, 'index'])->name('services');
        Route::get('/services/{service:slug}', [ServicesController::class, 'show'])->name('services.show');

        Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
        Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

        Route::get('/facilities', [FacilitiesController::class, 'index'])->name('facilities');

        Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');

        Route::get('/integrated-system', [IntegratedSystemController::class, 'index'])->name('integrated-system');

        Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

        Route::get('/media', [MediaController::class, 'index'])->name('media');

        Route::get('/products', [ProductsController::class, 'index'])->name('products');
        Route::get('/products/{product:slug}', [ProductsController::class, 'show'])->name('products.show');

        Route::get('/quality', [QualityController::class, 'index'])->name('quality');

        Route::get('/quote', [QuoteController::class, 'index'])->name('quote');
        Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
    }
);

require __DIR__ . '/dashboard.php';
