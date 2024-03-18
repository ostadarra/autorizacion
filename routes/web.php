<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Rutas para la gestion de clientes
    Route::resource('/cliente', ClienteController::class)->names('cliente');
    //Rutas para la gestion de roles
    Route::resource('/roles', RolController::class)->names('roles');
    // Rutas para la gestión de permisos
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    // Rutas para la gestión de usuarios
    Route::resource('/usuarios', UsuarioController::class)->names('usuarios');
});
