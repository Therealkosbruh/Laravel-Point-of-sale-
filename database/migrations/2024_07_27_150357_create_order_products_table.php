<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id'); 
            $table->unsignedBigInteger('product_id');
            $table->unsignedBiginteger('quantity'); 

            $table->primary(['order_id', 'product_id']);
            
            $table->foreign('order_id')
                  ->references('id')->on('orders')
                  ->onDelete('cascade'); 

            $table->foreign('product_id')
                  ->references('id')->on('products'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
