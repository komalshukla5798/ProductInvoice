<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tables;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tables::truncate();
        for($n = 1; $n <= 11; $n++){
        	$tables[$n] = ['name' => 'Table '.$n,'waiter_id' => $n,'capacity' => (int)$n];
        }
		tables::insert($tables);
    }
}
