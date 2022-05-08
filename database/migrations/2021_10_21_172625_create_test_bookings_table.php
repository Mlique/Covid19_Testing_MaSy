<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('time_slot');
            $table->string('Status')->nullable();
            $table->unsignedBigInteger('testRequest_id');
            $table->unsignedBigInteger('nurse_id');
            $table->timestamps();

            $table->foreign('testRequest_id')->references('id')->on('test_requests');
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
        Schema::dropIfExists('test_bookings');
    }
}
