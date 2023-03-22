<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cateogries_ids = Category::pluck('id')->toArray();
        foreach (Category::all() as $category) {
            $category->update([
                'category_id'=>fake()->randomElement($cateogries_ids)
            ]);
        }

        $programming = Category::create(['name'=>'programming']);
        $backend = Category::create(['name'=>'backend','category_id'=>$programming->id]);
        $frontend = Category::create(['name'=>'frontend','category_id'=>$programming->id]);
        $ai = Category::create(['name'=>'AI','category_id'=>$programming->id]);
    }
}
