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
            $table->string('product_name')->unique()->nullable();
            $table->float('product_price')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('alert_quantity')->nullable();
            $table->string('product_photo')->default('thumbnail.png')->nullable();
            $table->longText('slug');
            $table->timestamps();
            $table->softDeletes();
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
