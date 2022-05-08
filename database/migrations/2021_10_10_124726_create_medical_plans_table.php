<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_aid_id');
            $table->string('plan_name');
            
            $table->timestamps();
            $table->foreign('medical_aid_id')->references('id')->on('medical_aids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_plans');
    }
}
