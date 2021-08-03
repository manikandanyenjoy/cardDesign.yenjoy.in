<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("vendor_id");
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
            ->foreign("vendor_id")
            ->references("id")
            ->on("vendor_masters");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_shipping_addresses');
    }
}
