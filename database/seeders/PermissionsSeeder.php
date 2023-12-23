<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run() : void
    {
        // Очищаем кеш ролей и прав
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Создаем права
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-update']);

        // Создаем роли и назначаем им права
        $role1 = Role::create(['name' => 'client']);
        $role1->givePermissionTo('user-create');
        $role1->givePermissionTo('user-update');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('user-create');
        $role2->givePermissionTo('user-update');

        $role3 = Role::create(['name' => 'manager']);
        $role3->givePermissionTo('user-create');
        $role3->givePermissionTo('user-update');
    }
}
