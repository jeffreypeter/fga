<?php

use Illuminate\Database\Seeder;
use App\Models\Role;


class UserManagementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Users

        DB::table('users')->insert(array(
            array('name' => 'Jeffrey', 'email' => 'jeffravi@iu.edu', 'password' => bcrypt('password')),
            array('name' => 'Admin', 'email' => 'admin@fga.org', 'password' => bcrypt('password')),
            ));

        DB::table('permissions')->insert(array(
            array('name' => 'profile_mgmt', 'display_name' => 'Profile Management', 'description' => 'Manage personal profile'),
            array('name' => 'user_mgmt', 'display_name' => 'admin@fga.org', 'description' => 'Manager users'),
        ));

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
