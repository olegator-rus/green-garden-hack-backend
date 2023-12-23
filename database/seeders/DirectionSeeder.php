<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Direction::create(['name' => 'Белово', 'alias' => 'Бл']);
        Direction::create(['name' => 'Бийск', 'alias' => 'Бк']);
        Direction::create(['name' => 'Вышестеблиевская', 'alias' => 'Вш']);
        Direction::create(['name' => 'Гродеково ЭКСПОРТ', 'alias' => 'Гр']);
        Direction::create(['name' => 'Губаха', 'alias' => 'Гб']);
        Direction::create(['name' => 'Жеребцово', 'alias' => 'Жр']);
        Direction::create(['name' => 'Заринская', 'alias' => 'Зр']);
        Direction::create(['name' => 'Кавказ', 'alias' => 'Кв']);
        Direction::create(['name' => 'Калтан', 'alias' => 'Кл']);
        Direction::create(['name' => 'Красный камень', 'alias' => 'Кк']);
        Direction::create(['name' => 'Магнитогорск-Грузовой', 'alias' => 'Мг']);
        Direction::create(['name' => 'Междуреченск', 'alias' => 'Мж']);
        Direction::create(['name' => 'Металлургическая', 'alias' => 'Мт']);
        Direction::create(['name' => 'Мыс Астафьева', 'alias' => 'Ма']);
        Direction::create(['name' => 'Находка ЭКСПОРТ', 'alias' => 'Нх']);
        Direction::create(['name' => 'Находка ЭКСПОРТ (Усковский)', 'alias' => 'НхУ']);
        Direction::create(['name' => 'Находка ЭКСПОРТ (Ерунаковский)', 'alias' => 'НхЕ']);
        Direction::create(['name' => 'Находка ЭКСПОРТ (Распад ГЖ)', 'alias' => 'НхРГ']);
        Direction::create(['name' => 'Находка ЭКСПОРТ (Распад ГЖО)', 'alias' => 'НхРО']);
        Direction::create(['name' => 'Находка ЭКСПОРТ (Ясаульский)', 'alias' => 'НхЯ']);
        Direction::create(['name' => 'Находка-Восточная', 'alias' => 'Н-В']);
        Direction::create(['name' => 'Новокузнецк-Северный', 'alias' => 'Н-С']);
        Direction::create(['name' => 'Новокузнецк-Северный (Ерунаковский)', 'alias' => 'Н-СЕ']);
        Direction::create(['name' => 'Новокузнецк-Северный (Усковский)', 'alias' => 'Н-СУ']);
        Direction::create(['name' => 'Новороссийск', 'alias' => 'Нр']);
        Direction::create(['name' => 'Новотроицк', 'alias' => 'Нт']);
        Direction::create(['name' => 'Обнорская', 'alias' => 'Об']);
        Direction::create(['name' => 'Обнорская (Усковский)', 'alias' => 'ОбУ']);
        Direction::create(['name' => 'Обнорская (Ерунаковский)', 'alias' => 'ОбЕ']);
        Direction::create(['name' => 'Осинники', 'alias' => 'Ос']);
        Direction::create(['name' => 'Полосухино', 'alias' => 'Пл']);
        Direction::create(['name' => 'Предкомбинат', 'alias' => 'Пр']);
        Direction::create(['name' => 'Предкомбинат (Усковский)', 'alias' => 'ПрУ']);
        Direction::create(['name' => 'Смычка', 'alias' => 'См']);
        Direction::create(['name' => 'Смычка (Усковский)', 'alias' => 'СмУ']);
        Direction::create(['name' => 'Смычка (Ерунаковский)', 'alias' => 'СмЕ']);
        Direction::create(['name' => 'Успенская', 'alias' => 'Ус']);
        Direction::create(['name' => 'Смычка (Ерунаковский)', 'alias' => 'СмЕ']);
        Direction::create(['name' => 'Череповец-2', 'alias' => 'Чр']);
    }
}
