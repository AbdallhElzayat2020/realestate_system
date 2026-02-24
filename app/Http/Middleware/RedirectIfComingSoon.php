<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfComingSoon
{
    public function handle(Request $request, Closure $next): Response
    {
        // Only affect "web" traffic; allow non-GET requests to pass through
        if (!$request->isMethod('GET') && !$request->isMethod('HEAD')) {
            return $next($request);
        }

        $enabled = SiteSetting::getBool('coming_soon_enabled', false);
        if (!$enabled) {
            return $next($request);
        }

        // Allow specific named routes (works with localization prefixes like /ar/*)
        if ($request->routeIs('coming-soon') || $request->routeIs('home.preview')) {
            return $next($request);
        }

        // Allow dashboard/auth/health routes and the coming soon + preview pages
        if (
            $request->is('admin') ||
            $request->is('admin/*') ||
            $request->is('up') ||
            $request->is('preview') ||
            $request->is('coming-soon') ||
            $request->is('*preview') ||
            $request->is('*coming-soon')
        ) {
            return $next($request);
        }

        return redirect()->route('coming-soon');
    }
}

