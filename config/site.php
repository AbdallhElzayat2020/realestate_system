<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Site Contact (single source for entire site)
    |--------------------------------------------------------------------------
    */
    'phone' => env('SITE_PHONE', '+966 53 062 2030'),
    'phone_tel' => env('SITE_PHONE_TEL', '+966530622030'),
    'email' => env('SITE_EMAIL', 'contact@bazigha.com'),

    /*
    |--------------------------------------------------------------------------
    | Social links (defaults)
    |--------------------------------------------------------------------------
    | Used as fallback values if not set in the dashboard settings.
    */
    'social_links_enabled' => env('SOCIAL_LINKS_ENABLED', true),
    'contact_buttons_enabled' => env('CONTACT_BUTTONS_ENABLED', true),
    'whatsapp_url' => env('WHATSAPP_URL', 'https://wa.me/966533893288'),
    'phone_button_enabled' => env('PHONE_BUTTON_ENABLED', true),
    'social' => [
        'linkedin' => env('SOCIAL_LINKEDIN_URL', ''),
        'instagram' => env('SOCIAL_INSTAGRAM_URL', ''),
        'x' => env('SOCIAL_X_URL', ''),
        'facebook' => env('SOCIAL_FACEBOOK_URL', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Coming Soon Mode
    |--------------------------------------------------------------------------
    | When true, the site root (/) shows the Coming Soon page. Set to false
    | when you're ready to launch the full site.
    */
    'coming_soon' => env('COMING_SOON', true),
];
