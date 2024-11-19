<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('Admin.dashboard.dashboard');
});



Route::get('/contenido/{seccion}', function ($seccion) {
    $vistas = [
        'principal' => 'Admin.principal.principal',
        'clientes' => 'Admin.clientes.clientes',
    ];

    if (array_key_exists($seccion, $vistas)) {
        return view($vistas[$seccion]);
    }

    return response()->json(['error' => 'Sección no encontrada'], 404);
});
