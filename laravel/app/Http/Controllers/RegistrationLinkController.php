<?php

namespace App\Http\Controllers;

use App\Models\Out;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationLinkController extends Controller
{
    public function newUserLink(Request $request)
    {
        //echo $request->token;
        $outs = Out::all();

        return view('admin.token.create', ['outs' => $outs]);
    }

    public function processNewUserLink(Request $request)
    {
        $token = Str::random(10);

        $userId = $request->userId;

        if ($userId) {
            Token::create([
                'token' => $token,
                'user_id' => $userId
            ]);
        } else {
            $outs = $request->input('outs');
            $outsStr = implode('-', $outs);

            Token::create([
                'token' => $token,
                'outs' => $outsStr
            ]);
        }
        //return view('token.show', ['link' => url("register/$token")]);
        return redirect()->route('admin.token.show', ['token' => $token]);
    }

    public function showToken(Request $request)
    {
        return view('admin.token.show', ['link' => url("register/$request->token")]);
    }
}
