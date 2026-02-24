<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SettingsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function edit()
    {
        $coming_soon_enabled = SiteSetting::getBool('coming_soon_enabled', false);
        $social_links_enabled = SiteSetting::getBool('social_links_enabled', (bool) config('site.social_links_enabled', true));
        $contact_buttons_enabled = SiteSetting::getBool('contact_buttons_enabled', (bool) config('site.contact_buttons_enabled', true));
        $phone_button_enabled = SiteSetting::getBool('phone_button_enabled', (bool) config('site.phone_button_enabled', true));

        $whatsapp_url = SiteSetting::getValue('whatsapp_url', (string) config('site.whatsapp_url', ''));

        $social_linkedin_url = SiteSetting::getValue('social_linkedin_url', (string) data_get(config('site.social'), 'linkedin', ''));
        $social_instagram_url = SiteSetting::getValue('social_instagram_url', (string) data_get(config('site.social'), 'instagram', ''));
        $social_x_url = SiteSetting::getValue('social_x_url', (string) data_get(config('site.social'), 'x', ''));
        $social_facebook_url = SiteSetting::getValue('social_facebook_url', (string) data_get(config('site.social'), 'facebook', ''));

        return view('dashboard.pages.settings.edit', compact(
            'coming_soon_enabled',
            'social_links_enabled',
            'contact_buttons_enabled',
            'phone_button_enabled',
            'whatsapp_url',
            'social_linkedin_url',
            'social_instagram_url',
            'social_x_url',
            'social_facebook_url',
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp_url' => ['nullable', 'string', 'max:255'],
            'social_linkedin_url' => ['nullable', 'url', 'max:255'],
            'social_instagram_url' => ['nullable', 'url', 'max:255'],
            'social_x_url' => ['nullable', 'url', 'max:255'],
            'social_facebook_url' => ['nullable', 'url', 'max:255'],
        ]);

        $comingSoonEnabled = $request->boolean('coming_soon_enabled');
        $socialLinksEnabled = $request->boolean('social_links_enabled');
        $contactButtonsEnabled = $request->boolean('contact_buttons_enabled');
        $phoneButtonEnabled = $request->boolean('phone_button_enabled');

        SiteSetting::setValue('coming_soon_enabled', $comingSoonEnabled);
        SiteSetting::setValue('social_links_enabled', $socialLinksEnabled);
        SiteSetting::setValue('contact_buttons_enabled', $contactButtonsEnabled);
        SiteSetting::setValue('phone_button_enabled', $phoneButtonEnabled);

        SiteSetting::setValue('whatsapp_url', (string) $request->input('whatsapp_url', ''));
        SiteSetting::setValue('social_linkedin_url', (string) $request->input('social_linkedin_url', ''));
        SiteSetting::setValue('social_instagram_url', (string) $request->input('social_instagram_url', ''));
        SiteSetting::setValue('social_x_url', (string) $request->input('social_x_url', ''));
        SiteSetting::setValue('social_facebook_url', (string) $request->input('social_facebook_url', ''));

        return redirect()
            ->route('dashboard.settings.edit')
            ->with('success', 'Settings updated successfully');
    }
}

