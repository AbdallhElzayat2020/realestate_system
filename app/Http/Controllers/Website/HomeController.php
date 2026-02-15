<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('created_at', 'desc')->get();
        $projects = Project::active()->with('service')->orderBy('created_at', 'desc')->take(6)->get();
        $homeBlogs = Blog::active()->showOnHome()->latest()->take(6)->get();
        $partners = Partner::active()->orderBy('order')->orderBy('created_at', 'desc')->get();
        $testimonials = Testimonial::active()->orderBy('order')->orderBy('created_at')->get();

        return view('website.pages.home', compact('services', 'projects', 'homeBlogs', 'partners', 'testimonials'));
    }
}
