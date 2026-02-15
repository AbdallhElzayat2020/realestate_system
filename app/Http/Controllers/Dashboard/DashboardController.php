<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\JobApplication;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DashboardController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    /**
     * Show the dashboard home page with statistics.
     */
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'blogs' => Blog::count(),
            'partners' => Partner::count(),
            'testimonials' => Testimonial::count(),
            'contacts' => Contact::count(),
            'quotes' => Quote::count(),
            'job_applications' => JobApplication::count(),
        ];

        $chart_data = $this->getChartData();

        return view('dashboard.pages.home', compact('stats', 'chart_data'));
    }

    private function getChartData(): array
    {
        $days = [];
        $values = [];
        for ($i = 6; $i >= 0; $i--) {
            $days[] = now()->subDays($i)->format('M d');
            $values[] = Contact::whereDate('created_at', now()->subDays($i))->count();
        }
        return [
            'labels' => $days,
            'data' => $values,
        ];
    }
}
