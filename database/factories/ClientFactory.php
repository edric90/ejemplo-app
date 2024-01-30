<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "first_name"=>$this->faker->firstName,
            "last_name"=>$this->faker->lastName,
            "cell_phone"=>$this->faker->phoneNumber,
            "zone"=>$this->faker->postcode,
            "address"=>$this->faker->address,
        ];
    }
}
