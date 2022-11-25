<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laurent\Laurent;
use App\Models\Out;

class LaurentController extends Controller
{
    public function out(Request $request)
    {
        $id = $request->id;
        $modelOut = Out::find($id);

        $type = $modelOut->type;
        $out = (int) $modelOut->out;
        $mode = $modelOut->mode;
        $host = $modelOut->laurent->host;
        
        if ($mode === 'toggle') {
            return Laurent::toggleOut($host, $type, $out);
        }

        if ($mode === 'timer') {
            return Laurent::outTimer($host, $type, $out);
        }
    }

    public function allStatus()
    {
        return Laurent::allStatus('http://192.168.0.101');
    }
}
