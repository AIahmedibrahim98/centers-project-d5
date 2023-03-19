<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maneger>
 */
class ManegerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companies_ids = Company::pluck('id')->toArray();
        return [
            'name'=>fake()->name('female'),
            // 'company_id'=> $this->faker->randomElement($companies_ids)
        ];
    }
}
