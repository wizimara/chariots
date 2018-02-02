<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carimages', function (Blueprint $table) {
            $table->increments('id');
			$table->bigInteger('vehicle_id');
			$table->string('title')->nullable($value = true);
			$table->string('url');
			$table->tinyInteger('featured')->default(0)->nullable($value = true);
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
        Schema::dropIfExists('carimages');
    }
}
