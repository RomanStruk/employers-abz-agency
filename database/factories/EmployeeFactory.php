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
        $positions = Position::all();
        return [
            'name' => $this->faker->name,
            'phone' => '+380(66)'.random_int(1000000, 9999999),
            'email' => $this->faker->unique()->email,
            'position_id' => $positions->random()->id,
            'salary' => $this->faker->randomFloat(3,0, 500),
            'date_of_employment' => now(),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
            'photo' => 'default.jpg',
        ];
    }
}
