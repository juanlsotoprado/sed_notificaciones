<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AppController extends Controller {

    /**
     * Show si va
     * the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct() {

        $this->middleware('Auth_ldap');
    }

    public function Index() {

        return view("Pages/index");
    }

}
