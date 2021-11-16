<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shipping_id');
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->unsignedBigInteger('shopping_cart_id');
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->unsignedBigInteger('shipping_company_details_id');
            $table->foreign('shipping_company_details_id')->references('id')->on('shipping_company_details');
            $table->unsignedBigInteger('shipping_details_id');
            $table->foreign('shipping_details_id')->references('id')->on('shipping_details');


            $table->string('payment')->nullable(false);
            $table->string('discount_coupon');
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
        Schema::dropIfExists('orders');
    }
}
