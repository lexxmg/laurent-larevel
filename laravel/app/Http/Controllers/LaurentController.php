<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laurent\Laurent;

class LaurentController extends Controller
{
    public function out(Request $request)
    {
        $out = (int) $request->out;
        $param = $request->param;

        $res = Laurent::runOut('http://192.168.0.101', 'out', $out, $param);

        return $res;
    }

    public function allStatus()
    {
        return Laurent::allStatus('http://192.168.0.101');
    }
}
