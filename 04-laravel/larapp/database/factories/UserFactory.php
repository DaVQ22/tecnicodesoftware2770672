<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array


    {

        $gender = fake()->randomElement(['male', 'female']);

        $carpetaDestino = 'C:\Users\AUTOCAD\Desktop\tecnicodesoftware2770672\04-laravel\larapp\public\images';

        return [
            'document'          => fake()->randomNumber(9, true),
            'birth'             => fake()->dateTimeBetween('1980-01-01', '2002-12-31'),
            'gender'            => $gender,
            'fullname'          => fake()->name($gender),
            'photo'             => fake()->image($carpetaDestino, 640, 480),
            'phone'             => fake()->phoneNumber(),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('12345'),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
