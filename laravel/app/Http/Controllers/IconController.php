<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IconController extends Controller
{
    public function addIcon()
    {
        $className = request('icon');

        $res = DB::table('icons')->insert([
            'name' => $className
        ]);
        
        if ($res) {
            return ['success' => 'Данные добавлены в базу'];
        }

        return ['error' => 'неизвестная ошибка'];
    }    
}
