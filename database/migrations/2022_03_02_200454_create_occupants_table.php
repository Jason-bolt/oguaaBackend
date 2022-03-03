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
        Schema::create('occupants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('other_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('program');
            $table->string('level');
            $table->string('index_number')->unique();
            $table->string('room_number');
            $table->string('image');
            $table->boolean('hasKey')->nullable();
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
        Schema::dropIfExists('occupants');
    }
};
