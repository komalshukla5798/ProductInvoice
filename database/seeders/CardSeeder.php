<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::truncate();
		$products = array(
			array('user_id' => 1, 'card_number' => '5555555555554444'),
            array('user_id' => 1, 'card_number' => '4111111111111111')
		);
		Card::insert($products);
    }
}
