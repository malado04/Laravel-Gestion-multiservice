<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->admin == 0) {
            return '/home';
        }
        if (auth()->user()->admin == 1) {
            return '/home_lead';
        }
        if (auth()->user()->admin == 2) {
            return '/home_sup';
        }
        if (auth()->user()->admin == 3) {
            return '/home_agent';
        }
        if (auth()->user()->admin == 4) {
            return '/home';
        }
        return '/home';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}