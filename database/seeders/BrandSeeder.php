<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = config('db_fashion.brands');
        foreach ($brands as $brand) {
            $newBrand = new Brand;
            $newBrand->name = $brand;
            $newBrand->slug = Str::slug($newBrand->name, '-');
            $newBrand->save();
        }
    }
}