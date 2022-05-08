<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('id_number');
            $table->string('contact_number');
            $table->string('email_address');
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('medical_aid')->nullable();
            $table->string('medical_aid_no')->nullable();
            $table->unsignedBigInteger('suburb_id')->nullable();
            $table->unsignedBigInteger('medical_plan_id')->nullable();
            $table->unsignedBigInteger('main_member_id')->nullable();
            $table->timestamps();
            
            $table->foreign('suburb_id')->references('id')->on('suburbs');
            $table->foreign('medical_plan_id')->references('id')->on('medical_plans');
            $table->foreign('main_member_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependents');
    }
}
