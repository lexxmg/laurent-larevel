<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Out;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        //$arr = Out::all();
        if (isset(Auth::user()->id)) {
            $arr = User::find(Auth::user()->id)->out;
            return view('home', ['arr' => $arr]);
        }
    
        return view('home', ['arr' => []]);
    }
}
