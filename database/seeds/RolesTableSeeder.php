<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->display_name = 'Admin';
        $role_admin->description = 'Administrator';
        $role_admin->save();

        $role_mod = new Role();
        $role_mod->name = 'inv_mgr';
        $role_mod->display_name = 'Inventory Manager';
        $role_mod->description = 'Manages all inventory and locations';
        $role_mod->save();
    }
}
