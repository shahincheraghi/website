<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Morilog\Jalali\Jalalian;

class Visitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $ip = get_client_ip_env();
        $dateTime = Jalalian::now()->getTimestamp();
        $datenow = timestampDate($dateTime, true);
        $date = $datenow['date'];
        $getVisitors = Visitor::getVisitorsIp($ip, $date);
        if ($getVisitors == null)
            Visitor::store();


        return $next($request);
    }
}
