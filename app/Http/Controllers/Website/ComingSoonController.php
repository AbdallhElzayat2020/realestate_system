<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view('website.pages.coming-soon');
    }
}
