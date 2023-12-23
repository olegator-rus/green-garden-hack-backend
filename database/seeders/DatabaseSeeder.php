<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(MachinistSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(RollingSeeder::class);

        User::factory(10)->create()
            ->each(function ($user) {
                $user->assignRole('manager');
        });
        User::factory(10)->create()
            ->each(function ($user) {
                $user->assignRole('admin');
        });
    }
}
