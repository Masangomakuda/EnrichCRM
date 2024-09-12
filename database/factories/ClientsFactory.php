<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Clients;

class ClientsFactory extends Factory
{

    protected $model = Clients::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->unique()->safeEmail,
            'contact_phone_number' => $this->faker->phoneNumber(),
            'company_name' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'company_city' => $this->faker->city(),
            'company_vat' => $this->faker->randomNumber(5),
        ];
    }
}
