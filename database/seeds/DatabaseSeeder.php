<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserManagementTableSeeder::class);
        $this->call(InventoryTablesSeeder::class);
        //$this->call(LaratrustSeeder::class);
        //$this->call(RolesTableSeeder::class);
    }
}
