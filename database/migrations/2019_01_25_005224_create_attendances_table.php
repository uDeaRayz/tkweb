<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('atten_id');
            $table->unsignedInteger('user_id');
            $table->date('atten_date')->nullable();
            $table->integer('atten_total')->nullable();
            $table->time('atten_time')->nullable();
            $table->string('atten_status')->nullable();
            $table->string('atten_img')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
