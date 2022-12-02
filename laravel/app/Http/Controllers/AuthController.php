<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@ru',
            'password' => bcrypt('123')
        ]);

        Auth::loginUsingId($user->id, true);
        dd(Auth::user()->name);
    }
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        # code...
    }
}
