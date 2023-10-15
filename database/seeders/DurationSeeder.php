<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\duration;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // duration::truncate();
		$products = array(
			array('duration' => '15 Mins Or Less', 'discount' => 50.00 ,'x_charge' => 0.00),
            array('duration' => '16 to 30 Mins', 'discount' => 35.00 ,'x_charge' => 0.00),
            array('duration' => '31 to 45 Mins', 'discount' => 25.00 ,'x_charge' => 0.00),
            array('duration' => '46 to 59 Mins', 'discount' => 15.00 ,'x_charge' => 0.00),
            array('duration' => '60 to 75 Mins', 'discount' => 0.00 ,'x_charge' => 10.00),
            array('duration' => '75 to 90 Mins', 'discount' => 0.00 ,'x_charge' => 20.00),
            array('duration' => '90 Mins or More', 'discount' => 0.00 ,'x_charge' => 50.00),
			);
		duration::insert($products);
    }
}
