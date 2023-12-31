<?php

namespace Database\Factories;

use App\Models\posts;
use Illuminate\Database\Eloquent\Factories\Factory;

class postsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
