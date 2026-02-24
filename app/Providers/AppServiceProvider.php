<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Service;
use App\Models\SiteSetting;
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
        // Override contact config values from settings (used across views)
        $sitePhone = SiteSetting::getValue('site_phone', (string) config('site.phone'));
        $sitePhoneTel = SiteSetting::getValue('site_phone_tel', (string) config('site.phone_tel'));

        config([
            'site.phone' => $sitePhone,
            'site.phone_tel' => $sitePhoneTel,
        ]);

        View::composer(
            ['website.layouts.header', 'website.layouts.footer', 'website.components.social_links'],
            function ($view) {
                $socialLinksEnabled = SiteSetting::getBool('social_links_enabled', (bool) config('site.social_links_enabled', true));
                $contactButtonsEnabled = SiteSetting::getBool('contact_buttons_enabled', (bool) config('site.contact_buttons_enabled', true));
                $phoneButtonEnabled = SiteSetting::getBool('phone_button_enabled', (bool) config('site.phone_button_enabled', true));

                $view->with('socialLinksEnabled', $socialLinksEnabled);
                $view->with('contactButtonsEnabled', $contactButtonsEnabled);
                $view->with('phoneButtonEnabled', $phoneButtonEnabled);

                $view->with('whatsappUrl', SiteSetting::getValue('whatsapp_url', (string) config('site.whatsapp_url', '')));

                $view->with('socialLinks', [
                    'linkedin' => SiteSetting::getValue('social_linkedin_url', (string) data_get(config('site.social'), 'linkedin', '')),
                    'instagram' => SiteSetting::getValue('social_instagram_url', (string) data_get(config('site.social'), 'instagram', '')),
                    'x' => SiteSetting::getValue('social_x_url', (string) data_get(config('site.social'), 'x', '')),
                    'facebook' => SiteSetting::getValue('social_facebook_url', (string) data_get(config('site.social'), 'facebook', '')),
                ]);
            }
        );

        View::composer('website.layouts.footer', function ($view) {
            $view->with('footerServices', Service::active()->orderBy('created_at', 'desc')->take(6)->get());
            $view->with('footerBlogs', Blog::active()->latest()->take(5)->get());
        });
    }
}
