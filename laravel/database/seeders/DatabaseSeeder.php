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
        $outDescription = 'Выход Laurent OUT';
        $relleDescription = 'Выход Laurent REL';
        $virtDescription = 'Выход Laurent IN коибтнируемый выход для получения обратной связи';
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

        \App\Models\Gpio::insert([
            [
                'out' => 1,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 2,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 3,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 4,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 5,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 6,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 7,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 8,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 9,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 10,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 11,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 12,
                'type' => 'out',
                'description' => $outDescription
            ],
            [
                'out' => 1,
                'type' => 'relle',
                'description' => $relleDescription
            ],
            [
                'out' => 2,
                'type' => 'relle',
                'description' => $relleDescription
            ],
            [
                'out' => 3,
                'type' => 'relle',
                'description' => $relleDescription
            ],
            [
                'out' => 4,
                'type' => 'relle',
                'description' => $relleDescription
            ],
            [
                'out' => 1,
                'type' => 'virt',
                'description' => $virtDescription
            ],
            [
                'out' => 2,
                'type' => 'virt',
                'description' => $virtDescription
            ],
            [
                'out' => 3,
                'type' => 'virt',
                'description' => $virtDescription
            ],
            [
                'out' => 4,
                'type' => 'virt',
                'description' => $virtDescription
            ],
            [
                'out' => 5,
                'type' => 'virt',
                'description' => $virtDescription
            ],
            [
                'out' => 6,
                'type' => 'virt',
                'description' => $virtDescription
            ]
        ]);

        \App\Models\Out::insert([
            [
                'name' => '1',
                'gpio_id' => 1,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '2',
                'gpio_id' => 2,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '3',
                'gpio_id' => 3,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '4',
                'gpio_id' => 4,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '5',
                'gpio_id' => 5,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '6',
                'gpio_id' => 6,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '7',
                'gpio_id' => 7,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '8',
                'gpio_id' => 8,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'цветы',
                'gpio_id' => 9,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'релле-2',
                'gpio_id' => 14,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'laurent 2 релле-2',
                'gpio_id' => 14,
                'mode_id' => 1,
                'revers' => false,
                'laurent_id' => 2
            ],
            [
                'name' => 'laurent 2 out-2',
                'gpio_id' => 2,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 2
            ]
        ]);
    }
}
