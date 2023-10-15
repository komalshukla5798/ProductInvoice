<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodItems;

class FoodItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // FoodItems::truncate();
		$products = array(
			array('name' => 'Burger', 'category_id' => 1,'price' => 105, 'status' => 1),
            array('name' => 'American Dry Fruits', 'category_id' => 2,'price' => 80, 'status' => 1),
            array('name' => 'Paneer Makhani', 'category_id' => 3,'price' => 120, 'status' => 1),
            array('name' => 'Manchurian', 'category_id' => 5,'price' => 90, 'status' => 1),
			);
		FoodItems::insert($products);
    }
}
