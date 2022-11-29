<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laurent\Laurent;
use App\Models\Out;
use App\Models\Laurent as laur;
use PhpParser\Node\Stmt\Foreach_;

class LaurentController extends Controller
{
    public function out(Request $request)
    {
        $id = $request->id;
        $modelOut = Out::find($id);

        $type = $modelOut->gpio->type;
        $out = (int) $modelOut->gpio->out;
        $mode = $modelOut->mode->name;
        $host = $modelOut->laurent->host;
        
        if ($mode === null) {
            return ['success' => 'ok'];
        }

        if ($mode === 'toggle') {
            return Laurent::toggleOut($host, $type, $out);
        }

        if ($mode === 'timer') {
            return Laurent::outTimer($host, $type, $out);
        }
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $modelOut = Out::find($id);
        $host = $modelOut->laurent->host;

        return Laurent::status($host);
    }

    public function allStatus(Request $request)
    {
        $modelLaurent = laur::all();
        //Laurent::allStatus($modelLaurent);
        //echo ini_get('default_socket_timeout');
        return Laurent::allStatus($modelLaurent);
    }
}
