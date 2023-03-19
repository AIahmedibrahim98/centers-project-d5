<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category_ids = Category::pluck('id')->toArray();
        $vendor_ids = Vendor::pluck('id')->toArray();
        return [
            'name' => fake()->sentence(1),
            'price'=>$this->faker->numberBetween(500,5000),
            'hours'=>$this->faker->numberBetween(10,80),
            'category_id'=> $this->faker->randomElement($category_ids),
            'vendor_id'=> $this->faker->randomElement($vendor_ids),

        ];
    }
}
