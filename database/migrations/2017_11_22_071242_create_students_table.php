<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
      $table->increments('id');
      $table->string('name');
      $table->string('mis_no', 250)->unique();
      $table->string('gender');
      $table->string('ibutton_no')->nullable();
      $table->string('email', 250)->unique();
      $table->string('mobile_no');
      $table->string('profile_img');
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
        Schema::dropIfExists('students');
    }
}
