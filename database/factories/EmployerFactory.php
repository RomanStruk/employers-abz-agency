<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
            'position_id' => Position::all()->random()->id,
            'salary' => $this->faker->randomFloat(2,0, 500),
            'head' => 1,
            'date_of_employment' => now(),
            'created_id' => 1,
            'updated_id' => 1,
        ];
    }
}
