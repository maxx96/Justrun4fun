<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventUser;

class EventUsersTableSeeder extends Seeder
{
    public function run()
    {
        EventUser::factory(500)->create();
    }
}
