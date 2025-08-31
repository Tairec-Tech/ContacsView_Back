<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
        'user_id' => 1, // de momento, lo apuntamos al primer usuario
        'name' => $this->faker->firstName(),
        'lastname' => $this->faker->lastName(),
        'phone_number' => $this->faker->phoneNumber(),
        'email' => $this->faker->unique()->safeEmail(),
        'address' => $this->faker->address(),
        'notes' => $this->faker->sentence(),
        'favorite' => $this->faker->boolean(20), // 20% favoritos
    ];
    }
}
