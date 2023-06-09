<?php

namespace Database\Seeders;

use App\Models\Texture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textures = config('db_fashion.textures');
        foreach ($textures as $texture) {
            $newTexture = new Texture;
            $newTexture->name = $texture;
            $newTexture->slug = Str::slug($texture, '-');
            $newTexture->save();
        }
    }
}