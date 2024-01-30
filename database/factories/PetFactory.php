<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /*
            'name'=>$this->faker->name,
            'color'=>$this->faker->colorName,
            'gender'=>$this->faker->gender,
            'age'=>$this->faker->year,
            'type'=>$this->faker->Type,
            'client_id'=>$this->faker->Client->id,
            */
        ];
    }
}
