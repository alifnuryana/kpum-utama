<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'npm' => $this->faker->randomNumber(5, true),
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'major_id' => rand(1,6),
            'team_id' => rand(1, 10),
        ];
    }
}
