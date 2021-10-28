<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUKM
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
        if (!$status[0]->ukm) {
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
