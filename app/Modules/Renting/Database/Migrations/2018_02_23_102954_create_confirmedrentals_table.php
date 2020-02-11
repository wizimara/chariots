<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmedrentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmedrentals', function (Blueprint $table) {
            $table->increments('id');
              $table->bigInteger('booking_id');
              $table->tinyInteger('payment_status')->default(0)->nullable($value = true);
              $table->tinyInteger('car_pickup_status')->default(0)->nullable($value = true);
              $table->tinyInteger('owner_pickup_confirmation')->default(0)->nullable($value = true);
              $table->date('pick_up_date');
			  $table->string('pick_up_time');	
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
        Schema::dropIfExists('confirmedrentals');
    }
}
