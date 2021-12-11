<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('lrn')->nullable();
            $table->string('firstName', 40);
            $table->string('lastName', 40);
            $table->string('middleName', 40);
            $table->string('gender', 10);
            $table->date('birthDate');
            $table->string('birthPlace');
            $table->string('civilStatus');
            $table->string('nationality');
            $table->string('religion');
            $table->string('fatherName');
            $table->string('fatherOccup');
            $table->string('fatherContact')->nullable();
            $table->string('motherName');
            $table->string('motherOccup');
            $table->string('motherContact')->nullable();
            $table->string('guardianName')->nullable();
            $table->string('guardianContact')->nullable();
            $table->string('barangay');
            $table->string('town');
            $table->string('province');
            $table->string('grade_LVL');
            $table->string('elemSchool');
            $table->string('elemSchlAddr');
            $table->string('elemYrAttnd');
            $table->string('secondarySchool')->nullable();
            $table->string('secondarySchlAddr')->nullable();
            $table->string('secondaryYrAttnd')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
