<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('AdminMiddleware hit', ['user' => $request->user()?->id]);
        if (! $request->user() || ! $request->user()->is_admin) {
            abort(403);
        }
        return $next($request);
    }
}
