<?php

namespace Database\Seeders;

use App\Models\Rolling;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Создаем список (лист) видов подвижного состава
        Rolling::create(['name' => 'Тепловоз']);
        Rolling::create(['name' => 'Вагон для проводников']);
        Rolling::create(['name' => 'Крытый вагон']);
        Rolling::create(['name' => 'Машина ВПРС']);
        Rolling::create(['name' => 'Дрезина']);
        Rolling::create(['name' => 'Мотовоз']);
        Rolling::create(['name' => 'Платформа']);
        Rolling::create(['name' => 'Платформа ролики']);
        Rolling::create(['name' => 'Платформа УСО']);
        Rolling::create(['name' => 'Полувагон']);
        Rolling::create(['name' => 'Снегоочиститель СДПМ']);
        Rolling::create(['name' => 'Машина снегоуборочная СМ-2']);
        Rolling::create(['name' => 'Промежуточный полувагон СМ-2']);
        Rolling::create(['name' => 'Полувагон концевой СМ-2']);
        Rolling::create(['name' => 'Кран железнодорожный']);
        Rolling::create(['name' => 'Кран укладочный']);
        Rolling::create(['name' => 'Хоппер-дозатор']);
        Rolling::create(['name' => 'Цистерна']);
    }
}
