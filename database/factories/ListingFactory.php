<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bedrooms' => $this->faker->numberBetween(1, 7),
            'bathrooms' => $this->faker->numberBetween(1, 5),
            'area' => $this->faker->numberBetween(20, 500),
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'street' => $this->faker->streetName,
            'house_number' => $this->faker->buildingNumber,
            'price' => $this->faker->numberBetween(70000, 1500000),
        ];
    }
}
