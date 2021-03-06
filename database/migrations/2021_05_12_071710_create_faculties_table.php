<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('faculty_id');
            $table->string('faculty_firstname');
            $table->string('faculty_middlename')->nullable();
            $table->string('faculty_lastname');
            $table->string('faculty_fullname');
            $table->string('faculty_college');
            $table->string('faculty_type');
            $table->string('faculty_email')->unique();
            $table->string('faculty_image');
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
        Schema::dropIfExists('faculties');
    }
}
