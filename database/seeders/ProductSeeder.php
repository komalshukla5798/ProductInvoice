<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductMaster;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductMaster::truncate();
		$products = array(
			array('Name' => 'Product 1', 'Rate' => 10.99 ,'Unit' => 'Pieces'),
            array('Name' => 'Product 2', 'Rate' => 26.65 ,'Unit' => 'Kilograms'),
            array('Name' => 'Product 3', 'Rate' => 90.58 ,'Unit' => 'Grams'),
            array('Name' => 'Product 4', 'Rate' => 68.87 ,'Unit' => 'Kilograms'),
            array('Name' => 'Product 5', 'Rate' => 59.33 ,'Unit' => 'Kilograms'),
			);
		ProductMaster::insert($products);
    }
}
