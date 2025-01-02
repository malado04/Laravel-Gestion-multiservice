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


    protected $redirectTo = '/multiservice';
    protected function redirectTo()
    {
        if (auth()->user()->admin == 0) {
            return '/multiservice';
        }
        return '/multiservice';
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
            // 'cni' => ['required', 'int', 'min:10'],
            'prenom' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'int', 'min:7'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
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
        if (User::where('email',  $data['email'])->exists()) {
            return redirect()->route('users.create')
            ->with('error_message', 'Ce email est déja utilisé, veuillez utiliser un autre SVP');
        }
        if (User::where('telpor',  $data['tel'])->exists()) {
            return redirect()->route('users.create')
            ->with('error_message', 'Ce numéro de téléphone est déja utilisé, veuillez utiliser un autre SVP');
        
        }else{
            $code = Str::upper(Str::random(8)); // J1NMDQAFD5LM9DK5
            // $email = strtolower($data['prenom'].$data['name'].'@multiservice.com');
            $mdp=Hash::make("passer123");
            return User::create([
                'code_agent' => Str::upper(Str::random(8)),
                'name' => $data['name'],
                'prenom' => $data['prenom'],
                'telpor' => $data['tel'],
                'email' => $data['email']."@espace-services.com",
                'password' => $mdp,
                'admin' => 0,
            ]);
        } 

    }
}
