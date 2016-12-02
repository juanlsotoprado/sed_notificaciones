<?php

namespace App\Http\Middleware;

use Closure;

class Json {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //error_log(print_r(Request::wantsJson(), true));

        if (!$request->wantsJson()) {

            return redirect('/');
        }

        return $next($request);
    }

}
