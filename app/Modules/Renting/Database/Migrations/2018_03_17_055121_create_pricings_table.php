<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('vehicle_id');
            $table->decimal('dailyrate',12, 0);
            $table->string('dateranges')->nullable($value = true);
            $table->decimal('dailydriverrate',12, 0);
              $table->decimal('selfdrive',12, 0);
            $table->decimal('discount',12, 0)->default(0)->nullable($value = true);
              $table->decimal('costofdelivery',12, 0);
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
        Schema::dropIfExists('pricings');
    }
}
