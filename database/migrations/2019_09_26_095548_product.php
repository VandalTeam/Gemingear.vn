<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('url')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sale')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('instock')->nullable()->comment('0 Còn/1 Hết');
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
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
        Schema::dropIfExists('product');
    }
}
