<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Login\LoginController;

class RoleMiddleware {

    /**
     * Run the request filter.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role) {

        $login = new LoginController();
        if (!$login->VerificarPerfil()) {

            return redirect('logout');
        }

        if (Session::get('id_perfil') != $role) {

            switch (Session::get('id_perfil')) {
                case 1:
                    return redirect('admin');
                    break;

                case 4:
                    return redirect('analista');
                    break;

                default :
                    error_log('perfil de usuario no encontrado');
                    return redirect('logout');
            }
        }

        //   error_log($role);
        return $next($request);
    }

}
