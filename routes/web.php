<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\login\LoginController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('Admin.login.login');
});


Route::post('/admin/login', [LoginController::class, 'login']);


Route::middleware('auth')->group(function () {

    
    Route::get('/admin/principal', function () {
        return view('admin.principal.principal');
    })->name('admin.principal');
    
    Route::get('/admin/clientes', function () {
        return view('admin.clientes.clientes');
    })->name('admin.clientes');
    
    
    
});
