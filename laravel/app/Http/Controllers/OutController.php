<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Out;
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
        $user1 = User::find(1);
        $user2 = User::find(3);
        $allOuts = Out::all();
        $outs = Out::find([9, 4, 13]);
        
        //dd($outs);
        $user1->out()->detach($allOuts); // удаление выходов
        $user1->out()->attach([13, 7, 4, 9]); // вставка выходов

        $user2->out()->detach($allOuts); // удаление выходов
        $user2->out()->attach([12, 9, 4, 7, 13]); // вставка выходов
    }
}
