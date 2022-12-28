<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laurent\Laurent;
use App\Models\Out;
use App\Models\Laurent as laurentModel;

class LaurentController extends Controller
{
    public function out(Request $request)
    {
        $success = false;
        $currentUserId = NULL;;

        if (auth('web')->check()) {
            $currentUserId = auth('web')->user()->id;
        }

        $id = $request->id;
        $isAdmin = auth('admin')->check();

        $outsUser = Out::find($id)->user; // пользователи которым принадлежит кнопка

        foreach ($outsUser as $key => $value) {
            if ($value->id === $currentUserId) {
                $success = true;
                break;
            }
        }

        if (!$isAdmin && !$success) {
            $header = [
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            ];

            return response()->json(['error' => 'нет доступа'], 403, $header, JSON_UNESCAPED_UNICODE);
        }
        
        $modelOut = Out::find($id);
        
        $type = $modelOut->gpio->type;
        $out = (int) $modelOut->gpio->out;
        $mode = $modelOut->mode->name;
        $host = $modelOut->laurent->host;

        $virt_type = $modelOut->virt_type;
        $virt_off = $modelOut->virt_off;
        $virt_on = $modelOut->virt_on;
        
        if ($mode === null) {
            return ['success' => 'ok'];
        }

        if ($mode === 'toggle') {
            return Laurent::toggleOut($host, $type, $out);
        }

        if ($mode === 'timer') {
            return Laurent::outTimer($host, $type, $out);
        }

        if ($mode === 'virt') {
            return Laurent::outVirt($host, $out, $virt_type, $virt_on, $virt_off);
        }
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $modelOut = Out::find($id);
        $host = $modelOut->laurent->host;

        return Laurent::status($host);
    }

    public function allStatus()
    {
        $modelLaurent = laurentModel::all();
        //Laurent::allStatus($modelLaurent);
        //echo ini_get('default_socket_timeout');
        return Laurent::allStatus($modelLaurent);
    }
}
