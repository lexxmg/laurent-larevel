<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Token;

class AuthController extends Controller
{
    public function showRegisterForm(Request $request, $token)
    {
        $token = Token::where('token', $token)->first();
        $userId = $token->user_id;

        if ($userId) {
            if (Auth::guard('web')->loginUsingId($userId, true)) {
                $request->session()->regenerate();
                $token->delete();

                return redirect()->route('home');
            }
        }

        if ($token && !$userId) {
            return view('auth.register', 
                [
                    'token' => $token->token,
                    'name' => $token->name,
                    'device_name' => $token->device_name,
                    'user_id' =>$token->user_id
                ]
            );
        }
        
        return abort(403);
    }

    public function register(Request $request)
    {
        $token = $request->token;
        
        $token = Token::where('token', $token)->first();
        $outs = Str::of($token->outs)->explode('-');
        
        $date = $request->validate([
            'name' => ['required', 'string'],
            'device_name' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $date['name'],
            'device_name' => $date['device_name']
        ]);
        
        if ($user) {
            //$user = User::find($user->id);
            $user->out()->attach($outs); // вставка выходов

            if (Auth::guard('web')->loginUsingId($user->id, true)) {
                $request->session()->regenerate();
                $token->delete();

                return redirect()->route('home');
            }
        }

        return back()->withInput();
    }
}
