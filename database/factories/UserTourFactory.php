<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Tour;
use App\Models\User;
use App\Models\UserTour;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserTour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'tour_id' => Tour::all()->random()->id,
            'num_people' => random_int(2,6),
            'hotel_id' => Hotel::all()->random()->id,
            'fixed_price' => random_int(500, 1000),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
