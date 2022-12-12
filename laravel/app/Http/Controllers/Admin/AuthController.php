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
        $data = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        
        if (auth('admin')->attempt($data)) {
            $request->session()->regenerate();
            //return redirect(route('home'));
            return redirect(route('admin.home'));
        }

        return back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
