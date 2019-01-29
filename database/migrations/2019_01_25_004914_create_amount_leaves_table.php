<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmountLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amount_leaves', function (Blueprint $table) {
            $table->increments('amount_id');
            $table->unsignedInteger('leave_id');
            $table->unsignedInteger('user_id');
            $table->integer('amount_num');
            $table->foreign('leave_id')->references('leave_id')->on('leaves');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amount_leaves');
    }
}
