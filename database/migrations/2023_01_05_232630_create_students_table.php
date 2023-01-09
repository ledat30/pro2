<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name_students');
            $table->date('date_of_birth');
            $table->integer('gender');
            $table->string('address');
            $table->string('phone',13);
            $table->string('email');
            $table->string('account');
            $table->string('password');
            $table->foreignId('class_codes_id')->constrained('class_codes');
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
};
