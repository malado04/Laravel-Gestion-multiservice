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

use App\Http\Controllers\ControllerService;

use App\Models\Service;
use App\Models\Pdv;
use App\Models\User;
use App\Models\Zone;

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
// //************************************************************************************* 
        // $lead = User::where("admin", 1)->count();
        // $sup = User::where("admin", 2)->count();
        // $agent = User::where("admin", 3)->count();
        // $users = User::All();
        // $Pdv = Pdv::All();
        // $Zone = Zone::All();
 
        return view('home', [
        //     'leads' => $lead,
        //     'sups' => $sup,
        //     'agents' => $agent,
        //     'pdvs' => $Pdv,
        //     'zones' => $Zone,
        //     'users' => $users,
        ]);

})->name('home')->middleware('auth');

//************************************************************************************* 




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




 