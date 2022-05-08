<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('test_result_PN')->nullable();
            $table->string('temperature')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('oxygen_levels')->nullable();
            $table->integer('patient_id')->nullable();
            $table->unsignedBigInteger('labUser_id')->nullable();
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->unsignedBigInteger('testRequest_id')->nullable();
            $table->timestamps();

            $table->foreign('testRequest_id')->references('id')->on('test_requests')->onDelete('cascade');
            $table->foreign('labUser_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nurse_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
