<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
             'title' => fake()->title(),
            'text' => fake()->text(),
            'user_id' => rand(1,12),
//            'email_verified_at' => now(),
//            'password' => static::$password ??= Hash::make('password'),
//            'remember_token' => Str::random(10),
        ];
    }
}
