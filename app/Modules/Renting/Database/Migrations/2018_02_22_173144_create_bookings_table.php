<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('vehicle_id');
            $table->bigInteger('user_id');
            $table->string('booking_status');
            $table->date('date_of_booking');
            $table->date('starting_date_of_use');
            $table->date('end_date_of_use');
            $table->tinyInteger('driver_option')->default(0)->nullable($value = true);
            $table->decimal('totalcost',12, 0);
            $table->bigInteger('booked_by');
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
        Schema::dropIfExists('bookings');
    }
}
