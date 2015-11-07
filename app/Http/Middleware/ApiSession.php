<?php

namespace App\Http\Middleware;

use Closure;

class ApiSession {
    public function handle($request, Closure $next){

        \Config::set('session.driver', 'array');
        \Config::set('cookie.driver', 'array');

        return $next($request);
    }
}

?>