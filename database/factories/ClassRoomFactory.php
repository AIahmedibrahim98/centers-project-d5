<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassRoom>
 */
class ClassRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $branch_ids = Branch::pluck('id')->toArray();
        return [
            'name'=> fake()->sentence(1),
            'configration'=> fake()->sentence(10),
            'capacity'=> fake()->numberBetween(10,20),
            'branch_id'=> $this->faker->randomElement($branch_ids),
        ];
    }
}
