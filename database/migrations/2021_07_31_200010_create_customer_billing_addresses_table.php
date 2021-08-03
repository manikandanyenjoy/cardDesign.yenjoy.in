<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->string("fullname");
            $table->string("flatno");
            $table->string("apartment");
            $table->string("landmark");
            $table->string("area");
            $table->string("zipcode");
            $table->string("city");
            $table->string("country");
            $table->string("state");
            $table->timestamps();
            $table
            ->foreign("customer_id")
            ->references("id")
            ->on("customer_masters");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_billing_addresses');
    }
}
