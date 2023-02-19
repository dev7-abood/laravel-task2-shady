<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'website' => fake()->domainName(),
            'sector_id' => \App\Models\Sector::pluck('id')->random(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'address' => fake()->address()
        ];
    }
}
