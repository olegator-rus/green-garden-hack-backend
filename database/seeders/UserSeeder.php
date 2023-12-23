<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Создаем суперадмина
        $user = User::create([
            'name' => 'Бахтадзе-Карнаухов',
            'surname' => 'Олег',
            'patronymic' => 'Георгиевич',
            'email' => 'admin@unicry.yconnect.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        // Назначаем роль
        $user->assignRole('manager');
    }
}
