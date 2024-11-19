<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('Admin.dashboard.dashboard', [
        'contenido' => 'Admin.principal.principal',
    ]);
});

Route::get('/contenido/{seccion}', function ($seccion) {
    $vistas = [
        'principal' => 'Admin.principal.principal',
        'clientes' => 'Admin.clientes.clientes',
    ];

    return isset($vistas[$seccion]) ? view($vistas[$seccion]) : response()->json(['error' => 'Sección no encontrada'], 404);
});
