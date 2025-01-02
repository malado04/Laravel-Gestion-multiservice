<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeContoller;
use App\Http\Controllers\ControllerPdv;
use App\Http\Controllers\ControllerCaisse;
use App\Http\Controllers\ControllerZone;
use App\Http\Controllers\ControllerSolde;
use App\Http\Controllers\ControllerOperation;
use App\Http\Controllers\ControllerCommission;
use App\Http\Controllers\ControllerMultiservice;
use App\Http\Controllers\ControllerService;

use App\Models\Multiservice;
use App\Models\Service;
use App\Models\Commission;
use App\Models\Pdv;
use App\Models\User;
use App\Models\Zone;
use App\Models\Solde;
use App\Models\Operation;
use App\Models\Caisse;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Clear application cache:
// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return 'Application cache has been cleared';
// });

// //Clear route cache:
// Route::get('/route-cache', function() {
//     Artisan::call('route:cache');
//     return 'Routes cache has been cleared';
// });

// //Clear config cache:
// Route::get('/config-cache', function() {
//     Artisan::call('config:cache');
//     return 'Config cache has been cleared';
// }); 

// // Clear view cache:
// Route::get('/view-clear', function() {
//     Artisan::call('view:clear');
//     return 'View cache has been cleared';
// });
 

Route::get('/dashboard', function () {
    return view('auth.login');
});


Route::get('/', function () {
    return view('auth.login');
});

// Route::resource('articulos','App\Http\Controllers\ArticuloController');
// Route::get('/articulos/destory/{id}','App\Http\Controllers\ArticuloController@destroy')->name('articulos.delete');


Auth::routes();
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('profile', function() {
        
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user,
        ]);

})->name('profile')->middleware('auth');


Route::get('home', function() {
    if (Auth::user()->admin == 0) {
        
        $adm = User::where("admin", 0)->where("id", Auth::user()->id)->count();
        $sup = User::where("admin", 1)->where("fk_proprio_id", Auth::user()->id)->count();
        $agent = User::where("admin", 2)->where("fk_proprio_id", Auth::user()->id)->count();
        $users = User::where("fk_proprio_id", Auth::user()->id)->count();
        $servi = Service::where("fk_proprio_id", Auth::user()->id)->count();
        $services = Service::where("fk_proprio_id", Auth::user()->id)->get(); 
        $Pdv = Pdv::where("fk_proprio_id", Auth::user()->id)->get();
        $Pdvc = Pdv::where("fk_proprio_id", Auth::user()->id)->count();
        $Zone = Zone::where("fk_proprio_id", Auth::user()->id)->get();
        $Zonec = Zone::where("fk_proprio_id", Auth::user()->id)->count();
        $caisse = Caisse::where("fk_proprio_id", Auth::user()->id)->get();
        $caissesc = Caisse::where("fk_proprio_id", Auth::user()->id)->count();
 
        return view('home', [
            'users' => $users,
            'adm' => $adm,
            'sups' => $sup,
            'agents' => $agent,
            'pdvs' => $Pdv,
            'pdvsc' => $Pdvc,
            'zones' => $Zone,
            'zonesc' => $Zonec,
            'caisses' => $caisse,
            'caissesc' => $caissesc,
            'servi' => $servi,
            'services' => $services,
        ]);

    }
    


})->name('home')->middleware('auth');



Route::get('home_agent', function() {
    if (Auth::user()->admin == 2) {
        
        $adm = User::where("admin", 0)->where("id", Auth::user()->id)->count();
        $sup = User::where("admin", 1)->where("fk_proprio_id", Auth::user()->id)->count();
        $agent = User::where("admin", 2)->where("fk_proprio_id", Auth::user()->id)->count();
        $users = User::where("fk_proprio_id", Auth::user()->id)->count();
        $servi = Service::where("fk_proprio_id", Auth::user()->id)->count();
        $services = Service::where("fk_proprio_id", Auth::user()->id)->get(); 
        $Pdv = Pdv::where("fk_proprio_id", Auth::user()->id)->get();
        $Pdvc = Pdv::where("fk_proprio_id", Auth::user()->id)->count();
        $Zone = Zone::where("fk_proprio_id", Auth::user()->id)->get();
        $Zonec = Zone::where("fk_proprio_id", Auth::user()->id)->count();
        $caisse = Caisse::where("fk_proprio_id", Auth::user()->id)->get();
        $caissesc = Caisse::where("fk_proprio_id", Auth::user()->id)->count();
 
        return view('home_agent', [
            'users' => $users,
            'adm' => $adm,
            'sups' => $sup,
            'agents' => $agent,
            'pdvs' => $Pdv,
            'pdvsc' => $Pdvc,
            'zones' => $Zone,
            'zonesc' => $Zonec,
            'caisses' => $caisse,
            'caissesc' => $caissesc,
            'servi' => $servi,
            'services' => $services,
        ]);

    }
    
})->name('home_agent')->middleware('auth');


Route::get('home_gerant', function() {
    if (Auth::user()->admin == 1) {
        
        $adm = User::where("admin", 0)->where("id", Auth::user()->id)->count();
        $sup = User::where("admin", 1)->where("fk_proprio_id", Auth::user()->id)->count();
        $agent = User::where("admin", 2)->where("fk_proprio_id", Auth::user()->id)->count();
        $users = User::where("fk_proprio_id", Auth::user()->id)->count();
        $servi = Service::where("fk_proprio_id", Auth::user()->id)->count();
        $services = Service::where("fk_proprio_id", Auth::user()->id)->get(); 
        $Pdv = Pdv::where("fk_proprio_id", Auth::user()->id)->get();
        $Pdvc = Pdv::where("fk_proprio_id", Auth::user()->id)->count();
        $Zone = Zone::where("fk_proprio_id", Auth::user()->id)->get();
        $Zonec = Zone::where("fk_proprio_id", Auth::user()->id)->count();
        $caisse = Caisse::where("fk_proprio_id", Auth::user()->id)->get();
        $caissesc = Caisse::where("fk_proprio_id", Auth::user()->id)->count();
 
        return view('home_gerant', [
            'users' => $users,
            'adm' => $adm,
            'sups' => $sup,
            'agents' => $agent,
            'pdvs' => $Pdv,
            'pdvsc' => $Pdvc,
            'zones' => $Zone,
            'zonesc' => $Zonec,
            'caisses' => $caisse,
            'caissesc' => $caissesc,
            'servi' => $servi,
            'services' => $services,
        ]);

    }
    
})->name('home_gerant')->middleware('auth');

Route::get('inventaires', function() {
// //************************************************************************************* 
    if (Auth::user()->admin == 0) {
        $services = Service::where("fk_proprio_id", Auth::user()->id)->get();
        $soldec = Solde::where("fk_proprio_id", Auth::user()->id)->count();
        $opec = Operation::where("fk_proprio_id", Auth::user()->id)->count();
        $solde = Solde::all();
        $datey = (date(('Y')));
        $datem = (date(('m')));
        $dated = (date(('d')));
        $opey = Operation::whereYear('created_at', '=', $datey)->where("fk_proprio_id", Auth::user()->id)->get();
        $opem = Operation::whereMonth('created_at', '=', $datem)->where("fk_proprio_id", Auth::user()->id)->get();
        $oped = Operation::whereDate('created_at', Carbon::today())->where("fk_proprio_id", Auth::user()->id)->get();

        $opeyc = Operation::whereYear('created_at', '=', $datey)->where("fk_proprio_id", Auth::user()->id)->count();
        $opemc = Operation::whereMonth('created_at', '=', $datem)->where("fk_proprio_id", Auth::user()->id)->count();
        $opedc = Operation::whereDate('created_at', Carbon::today())->where("fk_proprio_id", Auth::user()->id)->count();

        // foreach ($ope as $key => $value) {
        //     var_dump($value);
        // }
        return view('inventaires', [
            'services' => $services,
            'solde' => $solde,
            'soldec' => $soldec,
            'opec' => $opec,
            'opey' => $opey,
            'opem' => $opem,
            'oped' => $oped,
            'opeyc' => $opeyc,
            'opemc' => $opemc,
            'opedc' => $opedc,
        ]);


    }elseif (Auth::user()->admin == 1) {
        
    } else {        

    }
    
        
})->name('inventaires')->middleware('auth');


Route::get('multiservice', function() {

    if (Auth::user()->admin == 0) {
        return view('/profile');
    } 
        
})->name('multiservice')->middleware('auth');

//************************************************************************************* 


Route::resource('multiservices', ControllerMultiservice::class)
    ->middleware('auth');

//************************************************************************************* 

Route::resource('commissions', ControllerCommission::class)
    ->middleware('auth');

//************************************************************************************* 

Route::resource('operations', ControllerOperation::class)
    ->middleware('auth');
//************************************************************************************* 

Route::resource('services', ControllerService::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('pdvs', ControllerPdv::class)
    ->middleware('auth');

Route::resource('caisses', ControllerCaisse::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('soldes', ControllerSolde::class)
    ->middleware('auth');
// ---------------------------------------------------------------------------------------------------
Route::resource('zones', ControllerZone::class)
    ->middleware('auth');
// ---------------------------------------------------------------------------------------------------
Route::resource('users', UserController::class)
    ->middleware('auth');
// ---------------------------------------------------------------------------------------------------
Route::resource('superviseurs', UserController::class)
    ->middleware('auth');

 
// ---------------------------------------------------------------------------------------------------
Route::resource('commissions', ControllerCommission::class)
    ->middleware('auth');




 