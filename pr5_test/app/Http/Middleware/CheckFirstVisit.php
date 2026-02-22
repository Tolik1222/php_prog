<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckFirstVisit
{
    public function handle(Request $request, Closure $next)
    {
        $lastVisit = $request->session()->get('last_visit');
        $isFirst = true;

        if ($lastVisit && now()->diffInMinutes($lastVisit) < 15) {
            $isFirst = false;
        }

        $request->session()->put('last_visit', now());

        View::share('first_in_15_minutes', $isFirst);

        View::share('client_ip', $request->ip());

        return $next($request);
    }
}