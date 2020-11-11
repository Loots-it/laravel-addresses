<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LootsIt\Address\Models\Address;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName,
            'house_number' => $this->faker->numberBetween(1, 9999),
            'bus_number' => $this->faker->randomLetter,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'country_code' => $this->faker->countryCode,
        ];
    }
}
