<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users_ids = User::pluck('id')->toArray();
        return [
            'job_title'=>fake()->jobTitle(),
            'salary'=> fake()->numberBetween(5000,30000),
            'hire_date'=> fake()->date()
            // 'user_id'=> fake()->unique(),
        ];
    }
}
