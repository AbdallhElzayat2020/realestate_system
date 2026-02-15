<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;

class AboutController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('created_at')->get();
        return view('website.pages.about', compact('services'));
    }
}
