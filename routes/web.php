<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\login\LoginController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('Admin.login.login');
})->name('login');


Route::post('/admin/login', [LoginController::class, 'login']);


Route::middleware('auth')->group(function () {


    Route::get('/admin/principal', function () {
        return view('admin.principal.principal');
    })->name('admin.principal');

    Route::get('/admin/clientes', function () {
        return view('admin.clientes.clientes');
    })->name('admin.clientes');

    Route::get('/admin/servicios', function () {
        return view('admin.servicios.servicios');
    })->name('admin.servicios');


    
});
