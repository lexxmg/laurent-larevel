<?php

namespace App\Http\Controllers;

use App\Models\Out;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationLinkController extends Controller
{
    public function newUserLink(Request $request)
    {
        //echo $request->token;
        $outs = Out::all();

        return view('registration-link', ['link' => 'link', 'outs' => $outs]);
    }

    public function processNewUserLink(Request $request)
    {
        $token = Str::random(10);
        $outs = $request->input('outs');
        $outsStr = implode('-', $outs);

        Token::create([
            'token' => $token,
            'outs' => $outsStr
        ]);

        return view('registration-link', ['link' => url("register/$token"), 'outs' => []]);
        //return redirect()->route('new-user-link', $token);
    }
}
