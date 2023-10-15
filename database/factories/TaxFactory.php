<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'GST',
            'percentage' => 18.00,
        ];
    }
}
