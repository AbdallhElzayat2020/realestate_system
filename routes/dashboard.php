<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\QuoteController;
use App\Http\Controllers\Dashboard\JobAppliedController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;

/* Public Routes Dashboard - Auth */

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');

/* Protected Routes - Dashboard */
Route::middleware(['auth'])->prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    // Contacts Routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Quotes Routes
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
    Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('quotes.show');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');

    // Job Applications Routes
    Route::get('/job-applications', [JobAppliedController::class, 'index'])->name('job-applications.index');
    Route::get('/job-applications/{application}', [JobAppliedController::class, 'show'])->name('job-applications.show');
    Route::delete('/job-applications/{application}', [JobAppliedController::class, 'destroy'])->name('job-applications.destroy');

    // FAQs Routes
    Route::resource('faqs', FaqController::class);

    // Categories Routes (for projects)
    Route::resource('categories', CategoryController::class);

    // Services Routes
    Route::resource('services', ServiceController::class);

    // Blogs Routes
    Route::resource('blogs', BlogController::class);

    // Projects Routes
    Route::resource('projects', ProjectController::class);

    // Products Routes
    Route::resource('products', ProductController::class);

    // Partners Routes (شركاء النجاح)
    Route::resource('partners', PartnerController::class);

    // Testimonials Routes (آراء العملاء)
    Route::resource('testimonials', TestimonialController::class);

    // Profile Routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Site Settings
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

/* Logout Route - Must be outside prefix to work correctly */
Route::middleware(['auth'])->post('/admin/logout', [LoginController::class, 'logout'])->name('dashboard.logout');
