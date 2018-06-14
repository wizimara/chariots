<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_price', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('booking_id');
            $table->decimal('cost1',12, 0);
            $table->decimal('cost2',12, 0);
            $table->decimal('cost3',12, 0);
            $table->decimal('cost4',12, 0);
            $table->decimal('cost5',12, 0);
            $table->decimal('cost6',12, 0);
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
        Schema::dropIfExists('booking_price');
    }
}
