<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

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
    
});
