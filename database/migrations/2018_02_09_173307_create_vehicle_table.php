<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('engine');
            $table->integer('power');
            $table->integer('km');
            $table->dateTime('registration');
            $table->string('color');
            $table->text('short_description');
            $table->text('description');
            $table->boolean('active')->default(false);
            $table->integer('priority')->default(10);
            $table->integer('price');
            $table->integer('id_model')->unsigned();
            $table->integer('id_patent')->unsigned();
            $table->integer('id_vehicle_type')->unsigned();
            $table->integer('id_emission_normative')->unsigned();
            $table->integer('id_traction')->unsigned();
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
        Schema::dropIfExists('vehicle');
    }
}
