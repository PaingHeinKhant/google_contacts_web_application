<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "firstName" => $this->faker->firstNameMale,
            "lastName" => $this->faker->lastName,
            "email" => $this->faker->email,
            "phone" => $this->faker->phoneNumber,
            "birthday" => $this->faker->date('Y-m-d'),
            "company"=>$this->faker->company,
            "user_id"=>User::inRandomOrder()->first()->id,
        ];
    }
}
