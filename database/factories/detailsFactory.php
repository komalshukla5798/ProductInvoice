<?php

namespace Database\Factories;

use App\Models\details;
use Illuminate\Database\Eloquent\Factories\Factory;

class detailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = details::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text()
        ];
    }
}
