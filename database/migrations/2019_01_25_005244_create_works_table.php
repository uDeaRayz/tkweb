<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('work_id');
            $table->unsignedInteger('user_id');
            $table->string('position')->nullable;
            $table->unsignedInteger('prov_id');
            $table->unsignedInteger('dist_id');
            $table->unsignedInteger('subdist_id');
            $table->date('date')->nullable;
            $table->string('detail')->nullable;
            $table->string('img')->nullable;
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prov_id')->references('prov_id')->on('provinces');
            $table->foreign('dist_id')->references('dist_id')->on('districts');
            $table->foreign('subdist_id')->references('subdist_id')->on('subdistricts');
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
        Schema::dropIfExists('works');
    }
}
