<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class InventoryTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storage1 = new \App\Models\Storage();
        $storage1->name = 'h1';
        $storage1->address = 'h1';
        $storage1->save();

        $storage2 = new \App\Models\Storage();
        $storage2->name = 'h2';
        $storage2->address = 'h2';
        $storage2->save();

        $category1 = new Category();
        $category1->name = 'Large';
        $category1->description = 'Large';
        $category1->save();

        $category2 = new Category();
        $category2->name = 'Small';
        $category2->description = 'Small';
        $category2->save();

    }
}
