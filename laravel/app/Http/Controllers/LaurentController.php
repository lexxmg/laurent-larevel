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
        
        if ($mode === 'toggle') {
            return Laurent::toggleOut('http://192.168.0.101', $type, $out);
        }

        if ($mode === 'timer') {
            return Laurent::outTimer('http://192.168.0.101', $type, $out);
        }
    }

    public function allStatus()
    {
        return Laurent::allStatus('http://192.168.0.101');
    }
}
