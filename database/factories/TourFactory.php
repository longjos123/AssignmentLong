<?php

namespace Database\Factories;

use App\Models\Countries;
use App\Models\Tour;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'num_day' => random_int(2,5),
            'transport_id' => Transport::all()->random()->id,
            'description' => $this->faker->text(),
            'price' => random_int(200,500),
            'countries_id' => Countries::all()->random()->id,
        ];
    }
}
