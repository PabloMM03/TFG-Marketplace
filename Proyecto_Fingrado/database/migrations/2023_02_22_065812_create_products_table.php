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
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->string('description')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_image2')->nullable();
            $table->float('price')->nullable();
            $table->float('original_price')->nullable();
            $table->string('qty')->nullable();
            $table->enum('status', [1,2])->default(1); //Estado publicado o en espera
            $table->enum('trending', [1,2])->default(1); //Estado popular o no popular

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tag_id')->default();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');


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
