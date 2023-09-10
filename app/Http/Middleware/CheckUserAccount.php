<?php

namespace App\Http\Middleware;

use App\Models\UserPerm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Model\UserRole;
use Closure;
use League\Flysystem\Config;

class CheckUserAccount
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
        if (!Auth::user()) {
            return redirect()->route('login');
        }else {
            return $next($request);
        }
    }
}
