<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_cards', function (Blueprint $table) {
            $table->id();
            $table->string("date");
            $table->unsignedBigInteger("customer_id");
            $table->string("lable");
            $table->unsignedBigInteger("designer_id");
            $table->string("design_number");
            $table->unsignedBigInteger("salesrep_id");
            $table->unsignedBigInteger("weaver_id");
            $table->unsignedBigInteger("warps_id");
            $table->string("picks");
            $table->string("total_picks");
            $table->unsignedBigInteger("loom_id");
            $table->string("total_repet");
            $table->string("wastage");
            $table->unsignedBigInteger("finishing_id");
            $table->string("cost_in_roll");
            $table->string("total_cost");
            $table->string("after_discount_cost");
            $table->string("speed_effiancy");
            $table->string("customer_grade");
            $table->string("catagory");
            $table->string("chart");
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
        Schema::dropIfExists('design_cards');
    }
}
