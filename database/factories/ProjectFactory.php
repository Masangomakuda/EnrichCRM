<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Clients;
use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
            // $users = collect(User::all()->modelKeys());
            $clients = collect(Clients::all()->modelKeys());
    
            return [
                'title' => $this->faker->sentence(2),
                'description' => $this->faker->paragraph(),
                'user_id' => $this->faker->numberBetween(1,3),
                'client_id' => $clients->random(),
                'duedate' => $this->faker->dateTimeBetween('+1 month', '+6 month'),
                'status' => Arr::random(Project::STATUS),
        ];
    }
}
