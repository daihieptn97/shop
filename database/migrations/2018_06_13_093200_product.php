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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cate_id');
            $table->unsignedInteger('shop_id');
            $table->string('name', 100);
            $table->string('unit', 10);
            $table->integer('count');
            $table->double('price', 20, 2);
            $table->text('description');
            $table->text('image')->nullable();
            $table->timestamps();

             $table->foreign('cate_id')->references('id')->on('category');
             $table->foreign('shop_id')->references('id')->on('shop')->onDelete('cascade');
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
