<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user['type'] == 'system_admin' && strtoupper($user['status']) == 'ACTIVE')
        {
            return $next($request);
        }
        return redirect('/')->with('message_warning','Sorry, you are not permitted to enter here. Please contact to your System Admin.');
    }
}
