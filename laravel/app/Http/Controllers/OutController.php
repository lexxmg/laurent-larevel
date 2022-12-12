<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Out;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OutController extends Controller
{
    public function getOutUser()
    {
        $user = User::find(1);
        //$out->out; // вернет все продукты для категории 1

        return $user->out;
    }

    public function addOuts()
    {
        $userId = request('user');
        $outs = request('outs');
        $outs = Str::of($outs)->explode('-');

        $user = User::find($userId);

        $user->out()->detach(); // удаление выходов
        $user->out()->attach($outs); // вставка выходов

        
        //$user2 = User::find(3);
        //$allOuts = Out::all();
        //$outs = Out::find([9, 4, 13]);
        
        //dd(empty($user2->out));

        //dd($outs);
        
        
        // $user2->out()->detach(); // удаление выходов
        // $user2->out()->attach([12, 17, 4, 7, 13]); // вставка выходов
    }
}
