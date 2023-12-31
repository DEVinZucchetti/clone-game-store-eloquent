<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products_requirements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->text('operational_system');
            $table->text('memory');
            $table->text('storage');
            $table->text('observations');
            $table->enum('type', ['MINIMUNS', 'RECOMMENDED']);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products_requirements');
    }
};
