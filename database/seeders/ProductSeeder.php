<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 100;$i++) {

            Product::create([
                "product_name"=>fake()->name,
                "product_desc"=>fake()->text,
                "product_price"=>rand(9,999999),
                "product_sku"=>rand(9, 99),
                "product_images"=>"",
                "categoryid"=>rand(9,99),
                "product_discount"=>"0",
                "active"=>rand(0,1),
                "vendorid"=>rand(9, 99),
            ]);
        }
    }
}
