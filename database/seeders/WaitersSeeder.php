<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\waiters;

class WaitersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // waiters::truncate();
		$waiters = array(
			array('name' => 'Waiter 1'),
            array('name' => 'Waiter 2'),
            array('name' => 'Waiter 3'),
            array('name' => 'Waiter 4'),
            array('name' => 'Waiter 5')
			);
		waiters::insert($waiters);
    }
}
