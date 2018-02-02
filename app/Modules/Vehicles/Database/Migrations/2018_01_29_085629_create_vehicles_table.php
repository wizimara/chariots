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
			$table->string('vehicle_name');
			$table->bigInteger('model_id');
			$table->bigInteger('make_id');
			$table->bigInteger('category_id');
			$table->string('year_model');
			$table->string('no_plate');
			$table->string('color');
			$table->string('passengers');
			$table->tinyInteger('tracker')->default(0);
			$table->tinyInteger('status')->default(0);
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
