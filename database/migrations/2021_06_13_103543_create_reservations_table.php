<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('time')->nullable();
            $table->date('date')->nullable();
            $table->enum('situation',['active','canceled','complete'])->nullable()->default('active');

            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('offer_id')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('period_id')->nullable();
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
