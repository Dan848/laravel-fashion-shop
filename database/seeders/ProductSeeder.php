<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            $newProduct->old_id = $product["id"];
            $newProduct->name = $product["name"];
            $newProduct->slug = Str::slug($newProduct->name, "-");
            $newProduct->image_link = ProductSeeder::storeimage($product['api_featured_image']);
            $newProduct->description = $product["description"];
            $newProduct->price = $product["price"];
            $newProduct->brand_id = $product["brand_id"];
            $newProduct->category_id = $product["category_id"];
            $newProduct->texture_id = $product["texture_id"];
            $newProduct->name = $product["name"];
            $newProduct->save();
        }
    }

    public static function storeimage($img)
    {
        $url = 'https:' . $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}
