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
            $table->increments("id");
            $table->string("name");
            $table->unsignedInteger("age")->nullable();
            $table->date("dob")->nullable();
            $table->string("gender")->nullable();
            $table->string("parent_name")->nullable();
            $table->string("parent_number")->nullable();
            $table->unsignedInteger("department_id")->nullable();
            $table->unsignedInteger("program_id")->nullable();
            $table->unsignedInteger("session_type_id")->nullable();
            $table->string("pin")->nullable();
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
