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
        
        for($i = 0;$i < 100;$i++) {

            Category::updateOrCreate([
                "category_name"=>fake()->name,
                "description"=>fake()->text,
                "photo"=>"",
                "parent"=>"0",
                "userid"=>rand(1,999),
            ]);

        }
    }
}
