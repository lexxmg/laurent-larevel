<?php

namespace App\Http\Controllers\Admin;

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
        $user = $request->email;
        $pass = $request->password;
        

        if (auth('admin')->attempt(['name' => $user, 'password' => $pass])) {
            //return redirect(route('home'));
            return ['success'];
        }

        return ['err'];
    }
}
