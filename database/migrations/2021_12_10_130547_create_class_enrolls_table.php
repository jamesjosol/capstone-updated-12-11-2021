<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_enrolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enroll_id')->unsigned();
            $table->bigInteger('session_id')->unsigned();

            $table->foreign('enroll_id')->references('id')->on('enrolls');
            $table->foreign('session_id')->references('id')->on('sessions');
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
        Schema::dropIfExists('class_enrolls');
    }
}
