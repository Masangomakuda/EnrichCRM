<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /** User Assigned this permission can Add,Update,view User only
        *  but can not Delete
        */
        Permission::create(['name' => 'manage users']);
        //User can delete 
        Permission::create(['name' => 'delete users']);


         // create roles and assign permissions
         Role::create(['name' => 'is_Admin'])->givePermissionTo(['manage users', 'delete users']);
         Role::create(['name' => 'is_Staff']);
         Role::create(['name' => 'is_User']);
    }
}
