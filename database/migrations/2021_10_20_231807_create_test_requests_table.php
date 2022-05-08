<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requestor_id')->nullable();
            $table->integer('test_subject_id')->nullable();
            $table->unsignedBigInteger('suburb_id')->nullable();
            $table->string('status')->default('New');
            $table->string('addressLine1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->string('number_of_people')->nullable();
            $table->timestamps();

            $table->foreign('requestor_id')->references('id')->on('users');
            $table->foreign('suburb_id')->references('id')->on('suburbs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_requests');
    }
}
