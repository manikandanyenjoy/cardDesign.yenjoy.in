<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStafMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staf_masters', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->integer('phone');
            $table->string("qualification");
            $table->string("blood_group");
            $table->string("joined_on");
            $table->string("left_on");
            $table->unsignedBigInteger("role_id");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table
            ->foreign("role_id")
            ->references("id")
            ->on("role_masters");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staf_masters');
    }
}
