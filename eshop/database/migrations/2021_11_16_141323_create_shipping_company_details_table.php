<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_company_details', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->string('company_name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('zip_code')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('country')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_company_details');
    }
}
