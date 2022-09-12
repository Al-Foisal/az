<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->text('category_id')->nullable();
            $table->text('product_name')->nullable();
            $table->text('product_slug')->nullable();
            $table->text('price')->nullable();
            $table->text('d_price')->nullable();
            $table->text('qty')->nullable();
            $table->text('color_1')->nullable();
            $table->text('color_2')->nullable();
            $table->text('color_3')->nullable();
            $table->text('sm')->nullable();
            $table->text('md')->nullable();
            $table->text('xl')->nullable();
            $table->text('best_sellar')->nullable();
            $table->text('new_collection')->nullable();
            $table->text('product_description')->nullable();
            $table->text('low_price')->nullable();
            $table->text('product_image')->nullable();
            $table->text('status')->nullable();
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
}
