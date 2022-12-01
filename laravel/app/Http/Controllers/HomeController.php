<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Out;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        //$arr = Out::all();
        $arr = User::find(1)->out;
    
        return view('home', ['arr' => $arr]);
    }
}
