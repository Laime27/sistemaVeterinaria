@extends('Admin.dashboard.dashboard')

@section('content')



    <h1>Principal</h1>



    @auth
        <h1>Bienvenido {{ Auth::user()->name }}</h1>
    @endauth

@endsection
