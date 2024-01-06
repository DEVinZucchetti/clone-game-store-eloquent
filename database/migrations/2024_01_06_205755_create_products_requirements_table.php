<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRequirementsTable extends Migration
{
    public function up()
    {
        Schema::create('product_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->text('operational_system')->nullable();
            $table->text('memory')->nullable();
            $table->text('storage')->nullable();
            $table->text('observations')->nullable();
            $table->enum('type', ['MINIMUNS', 'RECOMMENDED'])->default('MINIMUNS');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_requirements');
    }
}