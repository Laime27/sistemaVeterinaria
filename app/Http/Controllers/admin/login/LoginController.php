<?php

namespace App\Http\Controllers\Admin\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.principal');
        }

        return redirect()->back()->withErrors(['email' => 'Credenciales inválidas']);
        
    }

    


}
    	
