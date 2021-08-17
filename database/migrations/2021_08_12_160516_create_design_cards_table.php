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
            $table->string("label");
            $table->string('design_image');
            $table->string('design_file');
            $table->unsignedBigInteger("designer_id");
            $table->string("design_number");
            $table->unsignedBigInteger("salesrep_id");
            $table->longText("weaver_id");
            $table->unsignedBigInteger("warps_id");
            $table->string("picks");
            $table->string("total_picks");
            $table->text("loom_id");
            $table->string("total_repeat");
            $table->boolean("wastage")->comment('0-no, 1-yes');
            $table->unsignedBigInteger("finishing_id");
            $table->decimal("cost_in_roll",10,2);
            $table->decimal("total_cost",10,2);
            $table->decimal("after_discount_cost",10,2)->nullable();
            $table->string("speed_effiency")->nullable();
            $table->string("customer_grade");
            $table->string("category");
            $table->string("chart")->nullable();
            $table->integer("length");
            $table->integer("width");
            $table->integer("sq_inch");
            $table->decimal("cost_sq_inch",10,2);
            $table->text("add_on_cost")->nullable();
            $table->text("needle")->nullable();
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
