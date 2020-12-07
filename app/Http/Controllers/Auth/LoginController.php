<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::INICIO;

    public function username(Type $var = null)
    {
        return 'name';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
