<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config("db_fashion.products");
        foreach($products as $product) {
            $newProduct = new Product();
            $newProduct->old_id = $product["old_id"];
            $newProduct->name = $product["name"];
            $newProduct->slug = Str::slug($newProduct->name, "-");
            $newProduct->image_link = $product["image_link"];
            $newProduct->description = $product["description"];
            $newProduct->price = $product["price"];
            $newProduct->brand_id = $product["brand_id"];
            $newProduct->category_id = $product["category_id"];
            $newProduct->texture_id = $product["texture_id"];
            $newProduct->name = $product["name"];
            $newProduct->save();
        }
    }
}
