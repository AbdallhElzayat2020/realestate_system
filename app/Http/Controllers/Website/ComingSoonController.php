<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;

class ComingSoonController extends Controller
{
    public function index()
    {
        if (!SiteSetting::getBool('coming_soon_enabled', false)) {
            return redirect()->route('home');
        }

        return view('website.pages.coming-soon');
    }
}
