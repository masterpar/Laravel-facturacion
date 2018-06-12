<?php

namespace App\Http\Middleware;

use Closure;

class SignatureMiddleware
{
    
    public function handle($request, Closure $next, $header = 'X-name')
    {
        $response = $next($request);

        $response->headers->set($header, config('app.name'));  

        return $response; 

          }
}
