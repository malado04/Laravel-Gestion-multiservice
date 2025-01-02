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

        }else if (auth()->user()->admin == 1) {
            
            return '/home_gerant';

        }else if (auth()->user()->admin == 2) {
            
            return '/home_agent';

        }
        
        // return '/home';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}