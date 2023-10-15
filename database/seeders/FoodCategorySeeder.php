<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodCategory;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // FoodCategory::truncate();
		$products = array(
			array('name' => 'Fast Food', 'status' => 1),
            array('name' => 'Ice Creams', 'status' => 1),
            array('name' => 'Punjabi', 'status' => 1),
            array('name' => 'Gujarati', 'status' => 0),
            array('name' => 'Chinese', 'status' => 1),
            array('name' => 'South Indian', 'status' => 1),
			);
		FoodCategory::insert($products);
    }
}
