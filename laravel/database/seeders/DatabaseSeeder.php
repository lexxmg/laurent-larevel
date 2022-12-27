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
        $virtDescriptionFirstString = 'Выход Laurent IN-';
        $virtDescriptionLastString = ' комбинируемый выход для получения обратной связи';
        // \App\Models\User::factory(10)->create();
        \App\Models\AdminUser::insert([
            'name' => 'admin',
            'email' => 'lexx.mg@gmail.com',
            'password' => bcrypt('1234')
         ]);

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
                'name' => null,
                'description' => 'Пустой'
            ],
            [
                'name' => 'toggle',
                'description' => 'Переключатель'
            ],
            [
                'name' => 'timer',
                'description' => 'Включить на время'
            ],
            [
                'name' => 'virt',
                'description' => 'Кнопка с обратной связью'
            ]
        ]);

        \App\Models\Gpio::insert([
            [
                'out' => 1,
                'type' => 'out',
                'description' => $outDescription . '-1'
            ],
            [
                'out' => 2,
                'type' => 'out',
                'description' => $outDescription . '-2'
            ],
            [
                'out' => 3,
                'type' => 'out',
                'description' => $outDescription . '-3'
            ],
            [
                'out' => 4,
                'type' => 'out',
                'description' => $outDescription . '-4'
            ],
            [
                'out' => 5,
                'type' => 'out',
                'description' => $outDescription . '-5'
            ],
            [
                'out' => 6,
                'type' => 'out',
                'description' => $outDescription . '-6'
            ],
            [
                'out' => 7,
                'type' => 'out',
                'description' => $outDescription . '-7'
            ],
            [
                'out' => 8,
                'type' => 'out',
                'description' => $outDescription . '-8'
            ],
            [
                'out' => 9,
                'type' => 'out',
                'description' => $outDescription . '-9'
            ],
            [
                'out' => 10,
                'type' => 'out',
                'description' => $outDescription . '-10'
            ],
            [
                'out' => 11,
                'type' => 'out',
                'description' => $outDescription . '-11'
            ],
            [
                'out' => 12,
                'type' => 'out',
                'description' => $outDescription . '-12'
            ],
            [
                'out' => 1,
                'type' => 'relle',
                'description' => $relleDescription . '-1'
            ],
            [
                'out' => 2,
                'type' => 'relle',
                'description' => $relleDescription . '-2'
            ],
            [
                'out' => 3,
                'type' => 'relle',
                'description' => $relleDescription . '-3'
            ],
            [
                'out' => 4,
                'type' => 'relle',
                'description' => $relleDescription . '-4'
            ],
            [
                'out' => 1,
                'type' => 'virt',
                'description' => $virtDescriptionFirstString . '1' . $virtDescriptionLastString
            ],
            [
                'out' => 2,
                'type' => 'virt',
                'description' => $virtDescriptionFirstString . '2' . $virtDescriptionLastString
            ],
            [
                'out' => 3,
                'type' => 'virt',
                'description' => $virtDescriptionFirstString . '3' . $virtDescriptionLastString
            ],
            [
                'out' => 4,
                'type' => 'virt',
                'description' => $virtDescriptionFirstString . '4' . $virtDescriptionLastString
            ],
            [
                'out' => 5,
                'type' => 'virt',
                'description' => $virtDescriptionFirstString . '5' . $virtDescriptionLastString
            ],
            [
                'out' => 6,
                'type' => 'virt',
                'description' => $virtDescriptionFirstString . '6' . $virtDescriptionLastString
            ],
            [
                'out' => 1,
                'type' => 'temp',
                'description' => 'Темпиратура'
            ],
            [
                'out' => 1,
                'type' => 'abc1',
                'description' => 'АЦП-1'
            ],
            [
                'out' => 1,
                'type' => 'abc2',
                'description' => 'АЦП-2'
            ]
        ]);

        \App\Models\Icon::insert([
            [
                'name' => null,
                'description' => 'Нет изображения'
            ],
            [
                'name' => 'icon-tv',
                'description' => 'Телевизор'
            ],
            [
                'name' => 'icon-lamp',
                'description' => 'Настольная лампа'
            ],
            [
                'name' => 'icon-desklamp',
                'description' => 'Настольная лампа'
            ]
        ]);

        \App\Models\Out::insert([
            [
                'name' => '1',
                'icon_id' => 1,
                'gpio_id' => 1,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '2',
                'icon_id' => 1,
                'gpio_id' => 2,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '3',
                'icon_id' => 2,
                'gpio_id' => 3,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '4',
                'icon_id' => 3,
                'gpio_id' => 4,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '5',
                'icon_id' => 1,
                'gpio_id' => 5,
                'mode_id' => 3,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '6',
                'icon_id' => 1,
                'gpio_id' => 6,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '7',
                'icon_id' => 4,
                'gpio_id' => 7,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => '8',
                'icon_id' => 1,
                'gpio_id' => 8,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'цветы',
                'icon_id' => 1,
                'gpio_id' => 9,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'релле-2',
                'icon_id' => 1,
                'gpio_id' => 14,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 1
            ],
            [
                'name' => 'laurent 2 релле-2',
                'icon_id' => 1,
                'gpio_id' => 14,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 2
            ],
            [
                'name' => 'laurent 2 out-2',
                'icon_id' => 1,
                'gpio_id' => 2,
                'mode_id' => 2,
                'revers' => false,
                'laurent_id' => 2
            ]
        ]);

        \App\Models\Out::insert([
            'name' => 'Темпиратура',
            'gpio_id' => 23,
            'laurent_id' => 1
        ]);

        \App\Models\Out::insert([
            'name' => 'кнопка с обратной связью',
            'icon_id' => 1,
            'gpio_id' => 17,
            'mode_id' => 4,
            'virt_on' => 2,
            'virt_off' => 3,  // номер выхода или NULL
            'virt_type' => 'relle', // relle snd out
            'revers' => false,
            'laurent_id' => 1
        ]);
    }
}
