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
            $table->enum('status', ['En existencia', 'Sin existencia'])->default('En existencia');
            $table->string('name')->unique();
            $table->string('slug');
            $table->decimal('price', 11,2)->default('0.00');
            $table->integer('cuantity');
            // $table->string('codigo_producto')->nullable();
            $table->string('product_image');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
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
