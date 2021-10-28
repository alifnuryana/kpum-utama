<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMPM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $status = Pengaturan::get();
        if (!$status[0]->mpm) {
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
