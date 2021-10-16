<?php

namespace Database\Seeders;

use App\Models\UserTour;
use Illuminate\Database\Seeder;

class UserTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserTour::factory(3)->create();
    }
}
