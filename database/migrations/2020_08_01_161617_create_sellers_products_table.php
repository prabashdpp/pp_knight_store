<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('seller_id');            
            $table->decimal('price')->default(0);
            $table->binary('seller_product image')->nullable();
            $table->integer('stock')->default(0);
            $table->text('seller_product_description')->nullable();
            $table->char('seller_product_status')->default(1)->comment('1-active','2-deactive');
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
        Schema::dropIfExists('sellers_products');
    }
}
