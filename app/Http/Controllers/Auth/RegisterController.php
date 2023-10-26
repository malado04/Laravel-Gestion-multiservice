<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;


    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->admin == 0) {
            return '/home';
        }
        return '/home_cit';
    }
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cni' => ['required', 'int', 'min:10'],
            // 'prenom' => ['required', 'string', 'max:255'],
            // 'tel' => ['required', 'int', 'min:7'],
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         $code = Str::upper(Str::random(8)); // J1NMDQAFD5LM9DK5
        return User::create([
            'cni' => $data['cni'],
            'code_agent' => Str::upper(Str::random(8)),
            'prenom' => $data['prenom'],
            'tel' => $data['tel'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin' => 1,
        ]);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
    }
}
