<?php

use App\Http\Controllers\AsignarpermisoUsersController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // el controlador fue creado con resource y la ruta se define con resources(recursos)
    // Route::resource('/clients',ClienteController::class)->names('cliente');
    // Route::resource('/roles',RolesController::class)->names('roles');
    // Route::resource('/permisos',PermisoController::class)->names('permisos');
    // Route::resource('/userspermisos',AsignarpermisoUsersController::class)->names('userspermisos');

    // Route::middleware(['can:editar,eliminar,ver'])->group(function () {
    //     Route::resource('/clients', ClienteController::class)->names('cliente');
    //     Route::resource('/roles', RolesController::class)->names('roles');
    //     Route::resource('/permisos', PermisoController::class)->names('permisos');
    //     Route::resource('/userspermisos', AsignarpermisoUsersController::class)->names('userspermisos');
    // });
     // Protege las rutas con el middleware 'role'
     Route::middleware(['role:administrador'])->group(function () {
        Route::resource('/roles', RolesController::class)->names('roles');
        Route::resource('/permisos', PermisoController::class)->names('permisos');
        Route::resource('/userspermisos', AsignarpermisoUsersController::class)->names('userspermisos');
    });
     Route::middleware(['role:administrador|tecnico'])->group(function () {
        Route::resource('/clients', ClienteController::class)->names('cliente');
    });

    
});
