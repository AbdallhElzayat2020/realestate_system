<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('created_at', 'desc')->get();
        return view('website.pages.services', compact('services'));
    }

    public function show(Service $service)
    {
        if ($service->status !== 'active') {
            abort(404);
        }
        return view('website.pages.service-details', compact('service'));
    }
}
