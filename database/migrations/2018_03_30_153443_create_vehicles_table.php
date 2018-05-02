<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('power');
            $table->integer('km');
            $table->string('enrollment');
            $table->dateTime('enrollment_date');
            $table->string('color');
            $table->text('short_description');
            $table->text('description');
            $table->boolean('active')->default(false);
            $table->integer('priority')->default(10);
            $table->float('price');
            $table->float('price_bought');
            $table->float('profit');
            $table->float('margin');
            $table->integer('pattern_id')->unsigned();
            $table->integer('patent_id')->unsigned();
            $table->integer('emission_regulation_id')->unsigned()->nullable();
            $table->integer('traction_id')->unsigned();
            $table->integer('combustible_id')->unsigned();
            $table->integer('gearshift_id')->unsigned();
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
        Schema::dropIfExists('vehicles');
    }
}
