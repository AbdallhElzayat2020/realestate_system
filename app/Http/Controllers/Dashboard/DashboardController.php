<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;

class DashboardController  implements HasMiddleware
{
    /**
     * Create a new controller instance.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    /**
     * Show the dashboard home page.
     */
    public function index()
    {
        // Get analytics data
        $stats = [
            'total_users' => DB::table('users')->count(),
            'total_contacts' => DB::table('contacts')->count() ?? 0,
            'total_quotes' => DB::table('quotes')->count() ?? 0,
            'total_jobs' => DB::table('job_applications')->count() ?? 0,
        ];

        // Get recent activities (if you have activity logs)
        $recent_activities = [];

        // Get recent quotes (if you have quotes table)
        $recent_quotes = [];

        // Get chart data for the last 7 days
        $chart_data = $this->getChartData();

        return view('dashboard.pages.home', compact('stats', 'recent_activities', 'recent_quotes', 'chart_data'));
    }

    /**
     * Get chart data for analytics
     */
    private function getChartData()
    {
        $days = [];
        $values = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $days[] = now()->subDays($i)->format('M d');
            // You can customize this to get actual data from your tables
            $values[] = rand(10, 100);
        }

        return [
            'labels' => $days,
            'data' => $values,
        ];
    }
}
