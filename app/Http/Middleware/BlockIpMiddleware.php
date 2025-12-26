<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockIpMiddleware
{
    protected array $blockedIps = [
        '78.173.11.165'
    ];

    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->ip(), $this->blockedIps)) {
            abort(403);
        }

        return $next($request);
    }
}
