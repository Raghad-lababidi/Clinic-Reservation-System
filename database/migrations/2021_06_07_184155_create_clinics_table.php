<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('price')->nullable();
            $table->string('view_time')->nullable();

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('doctor_id')->unique()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('clinics');
    }
}
