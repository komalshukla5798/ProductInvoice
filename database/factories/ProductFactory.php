<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [0,1];
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100,10000),
            'image' => $this->faker->imageUrl($width = 640, $height = 480,'products'),
            'is_active' => $this->faker->randomElement($status),
        ];
    }
}
