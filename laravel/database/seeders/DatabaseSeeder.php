<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Out::insert([
            [
                'name' => '1',
                'out' => '1',
                'type' => 'out',
                'stat' => '1',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '2',
                'out' => '2',
                'type' => 'out',
                'stat' => '2',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '3',
                'out' => '3',
                'type' => 'out',
                'stat' => '3',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '4',
                'out' => '4',
                'type' => 'out',
                'stat' => '4',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '5',
                'out' => '5',
                'type' => 'out',
                'stat' => '5',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '6',
                'out' => '6',
                'type' => 'out',
                'stat' => '6',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '7',
                'out' => '7',
                'type' => 'out',
                'stat' => '7',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => '8',
                'out' => '8',
                'type' => 'out',
                'stat' => '8',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => 'цветы',
                'out' => '9',
                'type' => 'out',
                'stat' => '9',
                'mode' => 'toggle',
                'revers' => false
            ],
            [
                'name' => 'релле-2',
                'out' => '2',
                'type' => 'relle',
                'stat' => '2',
                'mode' => 'toggle',
                'revers' => false
            ]
        ]);
    }
}
