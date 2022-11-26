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
        \App\Models\Laurent::insert([
            [
                'name' => 'Спальня',
                'host' => 'http://192.168.0.101',
                'on' => true
            ],
            [
                'name' => 'ГОстинная',
                'host' => 'http://192.168.0.102',
                'on' => false
            ]
        ]);

        \App\Models\Mode::insert([
            [
                'name' => 'toggle',
                'description' => 'Переключатель'
            ],
            [
                'name' => 'timer',
                'description' => 'Включить на время'
            ]
        ]);

        \App\Models\Type::insert([
            [
                'name' => 'out',
                'description' => 'Выход'
            ],
            [
                'name' => 'relle',
                'description' => 'Релле'
            ],
            [
                'name' => 'virt',
                'description' => 'Виртуальная кнопка'
            ],
        ]);

        \App\Models\Out::insert([
            [
                'name' => '1',
                'out' => '1',
                'type_id' => 1,
                'stat' => '1',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '2',
                'out' => '2',
                'type_id' => 1,
                'stat' => '2',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '3',
                'out' => '3',
                'type_id' => 1,
                'stat' => '3',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '4',
                'out' => '4',
                'type_id' => 1,
                'stat' => '4',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '5',
                'out' => '5',
                'type_id' => 1,
                'stat' => '5',
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '6',
                'out' => '6',
                'type_id' => 1,
                'stat' => '6',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '7',
                'out' => '7',
                'type_id' => 1,
                'stat' => '7',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '8',
                'out' => '8',
                'type_id' => 1,
                'stat' => '8',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'цветы',
                'out' => '9',
                'type_id' => 1,
                'stat' => '9',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'релле-2',
                'out' => '2',
                'type_id' => 2,
                'stat' => '2',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'laurent 2 релле-2',
                'out' => '2',
                'type_id' => 2,
                'stat' => '2',
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 2
            ],
            [
                'name' => 'laurent 2 out-2',
                'out' => '2',
                'type_id' => 1,
                'stat' => '2',
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 2
            ]
        ]);
    }
}
