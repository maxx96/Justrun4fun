<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'foundation_id' => $this->faker->randomElement(['1', '2', '3', '4']),
            'age_category_id' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8']),
            'is_active' => 1,
            'firstname' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'city' => $this->faker->city,
            'remember_token' => Str::random(10),
            'total_points' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
