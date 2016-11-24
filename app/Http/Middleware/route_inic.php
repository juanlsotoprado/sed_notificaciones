<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;

class route_inic {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {



        switch (Session::get('id_perfil') == 1) {
            case 1:
                return redirect('admin/Inicio');
                break;

            default :
                return redirect('logout');
        }

        return $next($request);
    }

}
