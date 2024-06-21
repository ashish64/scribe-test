<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LegalCase>
 */
class LegalCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' =>  User::factory(),
            'status' => fake()->randomElement(['A','C','H','X']),
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'employee_id' => fake()->randomNumber(),
            'advisor_id' => fake()->randomNumber(),
            'reference_id' => fake()->randomNumber(),
            'address' => fake()->address(),
            'metadata' => json_encode(['author' => fake()->name])
        ];
    }
}
