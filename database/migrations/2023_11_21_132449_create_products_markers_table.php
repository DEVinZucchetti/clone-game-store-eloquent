<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsMarkersTable extends Migration
{
    public function up()
    {
        Schema::create('products_markers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('marker_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('marker_id')->references('id')->on('markers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products_markers');
    }
}
