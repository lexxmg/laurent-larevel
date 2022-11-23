<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    static $arr = [
        [
            'id' => 1,
            'type' => 'out',
            'out' => 1,
            'stat' => 1
        ],
        [
            'id' => 2,
            'type' => 'out',
            'out' => 2,
            'stat' => 2
        ],
        [
            'id' => 3,
            'type' => 'out',
            'out' => 3,
            'stat' => 3
        ],
        [
            'id' => 4,
            'type' => 'out',
            'out' => 4,
            'stat' => 4
        ],
        [
            'id' => 5,
            'type' => 'out',
            'out' => 5,
            'stat' => 5
        ],
        [
            'id' => 6,
            'type' => 'out',
            'out' => 6,
            'stat' => 6
        ],
        [
            'id' => 7,
            'type' => 'out',
            'out' => 7,
            'stat' => 7
        ],
        [
            'id' => 8,
            'type' => 'out',
            'out' => 8,
            'stat' => 8
        ],
        [
            'id' => 9,
            'type' => 'out',
            'out' => 9,
            'stat' => 9
        ]
    ];

    public function home()
    {
        return view('home', ['arr' => self::$arr]);
    }
}
