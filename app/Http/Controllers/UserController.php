<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\User;

class UserController extends Controller
{
    public function login(){
        return view('components.login');
    }
    public function loginPost(Request $request):RedirectResponse
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->redirectToRoute('login');
        }

        return response()->redirectToRoute('login')->with('error', 'Email or Password wrong');
    }
    
}
