<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {

        Owner::create([
            'name' => 'Акционерное общество «НефтеТрансСервис»',
            'alias' => 'HTC',
            'hex' => '#BCF3FF',
            'external_owner_id' => '220287',
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'ЗАО «НефтеТрансСервис (дубль)»',
            'alias' => 'HTC',
            'hex' => '#BCF3FF',
            'external_owner_id' => '169320',
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'АО «НефтеТрансСервис»',
            'alias' => 'HTC',
            'hex' => '#BCF3FF',
            'external_owner_id' => NULL,
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'Общество с ограниченной ответственностью «Грузовая компания»',
            'alias' => 'GK',
            'hex' => '#C8F4C1',
            'external_owner_id' => '541642',
            'dolgostoy_value' => '4/7',
        ]);

        Owner::create([
            'name' => 'Общество с ограниченной ответственностью «Атлант»',
            'alias' => 'ATL',
            'hex' => '#FFB762',
            'external_owner_id' => '672113',
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'Общество с ограниченной ответственностью «Атлант»',
            'alias' => 'ATL',
            'hex' => '#FFB762',
            'external_owner_id' => '678194',
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'ООО «Атлант»',
            'alias' => 'ATL',
            'hex' => '#FFB762',
            'external_owner_id' => NULL,
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'ОАО «Первая грузовая компания»',
            'alias' => 'PGK',
            'hex' => '#FFBEFC',
            'external_owner_id' => '169342',
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'Открытое акционерное общество «Первая грузовая компания»',
            'alias' => 'PGK',
            'hex' => '#FFBEFC',
            'external_owner_id' => '398303',
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'Акционерное общество «Первая Грузовая Компания»',
            'alias' => 'PGK',
            'hex' => '#FFBEFC',
            'external_owner_id' => '72879',
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'АО «Первая грузовая компания»',
            'alias' => 'PGK',
            'hex' => '#FFBEFC',
            'external_owner_id' => NULL,
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'АО «ПГК»',
            'alias' => 'PGK',
            'hex' => '#FFBEFC',
            'external_owner_id' => NULL,
            'dolgostoy_value' => '5/5',
        ]);

        Owner::create([
            'name' => 'Общество с ограниченной ответственностью «Модум-Транс»',
            'alias' => 'MOD',
            'hex' => '#C5AAFF',
            'external_owner_id' => '556591',
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'ОАО РЖД',
            'alias' => 'RJD',
            'hex' => '#ABABAB',
            'external_owner_id' => '1',
            'dolgostoy_value' => '1/1',
        ]);

        Owner::create([
            'name' => 'АО «Новая перевозочная компания»',
            'alias' => 'NPK',
            'hex' => '#FDF0EF',
            'external_owner_id' => '113434',
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'АО «НПК»',
            'alias' => 'NPK',
            'hex' => '#FDF0EF',
            'external_owner_id' => NULL,
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'Акционерное общество «Федеральная грузовая компания»',
            'alias' => 'FGK',
            'hex' => '#FFF3B4',
            'external_owner_id' => '542299',
            'dolgostoy_value' => '3/5',
        ]);

        Owner::create([
            'name' => 'Общество с ограниченной ответственностью «Мечел-Транс»',
            'alias' => 'MECH',
            'hex' => '#ACCDFF',
            'external_owner_id' => '73774',
            'dolgostoy_value' => '3/5',
        ]);
    }
}
