<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'parent_id' => null,
            'level' => $this->faker->numberBetween(1, 5),
            'employee_count' => $this->faker->numberBetween(1, 100),
            'ambassador_name' => $this->faker->name,
        ];
    }
}
