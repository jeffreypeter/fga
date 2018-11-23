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

        $cat_large = new Category();
        $cat_large->name = 'Large';
        $cat_large->description = 'Large';
        $cat_large->save();

        $cat_medium = new Category();
        $cat_medium->name = 'Medium';
        $cat_medium->description = 'Medium';
        $cat_medium->save();

        $cat_small = new Category();
        $cat_small->name = 'Small';
        $cat_small->description = 'Small';
        $cat_small->save();



        DB::table('item_names')->insert(array(
            array('name' => 'Full Mattress', 'description' => 'Full Mattress', 'category_id' => $cat_medium->id),
            array('name' => 'Twin Mattress', 'description' => 'Twin Mattress', 'category_id' => $cat_medium->id),
            array('name' => '3 Seater Couch', 'description' => '3 Seater Couch', 'category_id' => $cat_large->id),
            array('name' => '2 Seater Couchs', 'description' => '2 Seater Couch', 'category_id' => $cat_large->id),
            array('name' => 'Sofa Chair', 'description' => 'Sofa Chair', 'category_id' => $cat_medium->id),
            array('name' => 'Study Desk', 'description' => 'Study Desk', 'category_id' => $cat_large->id),
            array('name' => 'Kitchen Table', 'description' => 'Kitchen Table', 'category_id' => $cat_large->id),
            array('name' => 'Book Shelf', 'description' => 'Book Shelf', 'category_id' => $cat_large->id),
            array('name' => 'Coffee Table', 'description' => 'Coffee Table', 'category_id' => $cat_medium->id),
            array('name' => 'End Table', 'description' => 'End Table', 'category_id' => $cat_medium->id),
            array('name' => 'Tall Lamp', 'description' => 'Tall Lamp', 'category_id' => $cat_small->id),
            array('name' => 'Dressers', 'description' => 'Dresser', 'category_id' => $cat_large->id),
            array('name' => 'Desk Chair', 'description' => 'Desk Chair', 'category_id' => $cat_small->id),
            array('name' => 'Kitchen Chairr', 'description' => 'Kitchen Chair', 'category_id' => $cat_small->id),
        ));

    }
}
