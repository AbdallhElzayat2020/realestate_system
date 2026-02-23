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
    | Coming Soon Mode
    |--------------------------------------------------------------------------
    | When true, the site root (/) shows the Coming Soon page. Set to false
    | when you're ready to launch the full site.
    */
    'coming_soon' => env('COMING_SOON', true),
];
