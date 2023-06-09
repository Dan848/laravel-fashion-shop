<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('old_id')->unique();
            $table->string('name', 200)->unique();
            $table->string('slug')->unique();
            $table->string('image_link')->nullable();
            $table->text('description')->nullable();
            $table->double('price',  10,2)->nullable();

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references("id")->on("brands")->onDelete("set null");

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references("id")->on("categories")->onDelete("set null");

            $table->unsignedBigInteger('texture_id')->nullable();
            $table->foreign('texture_id')->references("id")->on("textures")->onDelete("set null");
;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
