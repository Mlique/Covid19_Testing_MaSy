<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->unique();
            $table->unsignedBigInteger('suburb_id')->nullable();
            $table->unsignedBigInteger('nurse_id')->nullable;
            $table->timestamps();

            $table->foreign('suburb_id')->references('id')->on('suburbs');
            $table->foreign('nurse_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurses');
    }
}
