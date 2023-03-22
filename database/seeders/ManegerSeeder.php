<?php

namespace Database\Seeders;

use App\Models\Maneger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManegerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manegers = Maneger::all();
        foreach ($manegers as $key => $maneger) {
            $maneger->company_id = $key + 1;
            $maneger->save();
        }
    }
}
