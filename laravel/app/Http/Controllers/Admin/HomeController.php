<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Out;

class HomeController extends Controller
{
   public function index()
   {    
        $arr = Out::all();

        return view('admin.home', ['arr' => $arr]);
   }
}
