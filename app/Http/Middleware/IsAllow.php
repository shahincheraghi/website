<?php

namespace App\Http\Middleware;

use App\Models\UserPerm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use Closure;
use League\Flysystem\Config;

class IsAllow
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!Auth::check())
            return redirect()->route('login');

        if (Auth::user()->type == 0) {
            return $next($request);
        }


        $routeName = $request->route()->getName();
        if (isset(\Illuminate\Support\Facades\Config::get('freeRoute')[$routeName])) {
            return $next($request);
        }

        $check = \App\Models\UserPerm::checkRouteNameUser($routeName, Auth::id());
        if ($check) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
