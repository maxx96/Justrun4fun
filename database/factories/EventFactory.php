<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'place' => $this->faker->city,
            'event_date' => $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'category_id' => $this->faker->numberBetween(1, 5),
            'web_page' => 'https://maratonwarszawski.com/',
            'fanpage' => 'https://www.facebook.com/MaratonWarszawski',
            'sign_up' => 'https://www.facebook.com/MaratonWarszawski',
            'photo_id' => 1,
        ];
    }
}
