<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_leaves', function (Blueprint $table) {
            $table->increments('add_id');
            $table->unsignedInteger('amount_id');
            $table->unsignedInteger('user_id');
            $table->string('add_type',1)->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->float('total', 8, 2)->nullable();
            $table->string('img')->nullable();
            $table->string('detail')->nullable();
            $table->string('status',1)->nullable();
            $table->string('resson_id')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('add_leaves');
    }
}
