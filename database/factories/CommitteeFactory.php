<?php

namespace Database\Factories;

use App\Models\Committee;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommitteeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Committee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'npm' => $this->faker->randomNumber(5, true),
            'position' => $this->faker->jobTitle(),
            'path' => '',
            'major_id' => rand(1, 16),
        ];
    }
}
