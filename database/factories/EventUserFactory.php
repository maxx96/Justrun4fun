<?php

namespace Database\Factories;

use App\Models\EventUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventUserFactory extends Factory
{
    protected $model = EventUser::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'event_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
