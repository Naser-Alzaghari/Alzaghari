<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();

        if (!Cache::has("visited_{$ip}")) {
            $visit = Visit::first();
            if ($visit) {
                $visit->increment('count');
            } else {
                Visit::create(['count' => 1]);
            }

            // Cache the visit for 24 hours
            Cache::put("visited_{$ip}", true, now()->addDay());
        }

        return $next($request);
    }
}
