<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => '+380('.random_int(10, 99).')'.random_int(1000000, 9999999),
            'email' => $this->faker->unique()->email,
            'position_id' => Position::all()->random()->id,
            'salary' => $this->faker->randomFloat(3,0, 500),
            'head_id' => 1,
            'date_of_employment' => now(),
            'created_id' => 1,
            'updated_id' => 1,
            'photo' => 'default.jpg',
        ];
    }
}
