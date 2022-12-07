<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // $data = $request->validate([
        //     'email' => ['required', 'email', 'string'],
        //     'password' => ['required']
        // ]);
        $user = $request->user;
        $pass = $request->password;
        

        if (auth('admin')->attempt(['name' => $user, 'password' => $pass])) {
            //return redirect(route('home'));
            return [$request->user()];
        }

        return ['err'];
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
