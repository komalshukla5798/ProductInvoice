<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory(5)->has(\App\Models\Product::factory(2))->create();

        // $category = \App\Models\Category::factory(5)->create();
        // $category->each(function ($u) {
        // 	$details = \App\Models\Product::factory()->make();
        //     $u->product()->save($details);
        // });
    }
}
