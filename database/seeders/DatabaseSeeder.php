<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        \App\Models\Tax::factory(1)->create();
        $this->call([
            //ProductCategorySeeder::class,
            WaitersSeeder::class,
            TableSeeder::class,
            DurationSeeder::class,
            FoodCategorySeeder::class,
            FoodItemsSeeder::class,
            CardSeeder::class,
            // BookingSeeder::class,
     	]);

      //   $posts = \App\Models\posts::factory(5)->has(\App\Models\comments::factory(2))->create();
      //   $posts->each(function ($u) {
      //       $details = \App\Models\details::factory()->make();
      //       $u->detail()->save($details);
      //   });


    }
}
