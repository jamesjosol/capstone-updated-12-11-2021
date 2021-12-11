<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_year_id')->unsigned();
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('level_id')->unsigned();
            $table->string('student_type', 20)->nullable();
            $table->string('track', 60)->nullable();
            $table->string('strand', 60)->nullable();

            $table->string('title', 60)->nullable();
            $table->string('remarks', 60)->nullable();
            $table->string('requirement_images')->nullable();
            
            $table->string('payment_channel', 50);
            $table->decimal('entrance_amount', 8, 2);
            $table->string('OR_num')->nullable();
            $table->string('OR_date')->nullable();
            $table->string('payment_image');

            $table->string('status', 10);

            $table->foreign('school_year_id')->references('id')->on('school_years');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('level_id')->references('id')->on('levels');
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
        Schema::dropIfExists('enrolls');
    }
}
