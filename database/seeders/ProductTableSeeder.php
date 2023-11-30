<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $storeProduct = [
            ['id'=>18,'jwelleryType_id'=>4,'product_name'=>'Ring'],
            ['id'=>19,'jwelleryType_id'=>4,'product_name'=>'Necklace'],
            ['id'=>20,'jwelleryType_id'=>4,'product_name'=>'Ear ring'],
        ];

        Product::insert($storeProduct);
    }
}
