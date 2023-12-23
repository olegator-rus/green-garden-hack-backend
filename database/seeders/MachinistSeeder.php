<?php

namespace Database\Seeders;

use App\Models\Machinist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachinistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Создаем список (лист) видов подвижного состава
        Machinist::create(['name' => 'Иван Сергеевич Смирнов', 'locomotive_id' => '422412']);
        Machinist::create(['name' => 'Сергей Олегович Булгаков', 'locomotive_id' => '422412']);
        Machinist::create(['name' => 'Ларион Петрович Михайлов', 'locomotive_id' => '123456']);
        Machinist::create(['name' => 'Петр Ильич Леусенко', 'locomotive_id' => '432121']);
        Machinist::create(['name' => 'Игнат Сергеевич Петров', 'locomotive_id' => '432121']);
        Machinist::create(['name' => 'Иван Владимирович Гончаров', 'locomotive_id' => '432121']);
    }
}
