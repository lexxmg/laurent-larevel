<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Out;

class HomeController extends Controller
{
    public function home()
    {
        $arr = Out::all();
    
        return view('home', ['arr' => $arr]);
    }
}
