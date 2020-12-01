<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pricing_id');
            $table->string('discount_type');
            $table->integer('number_of_days')->nullable();
            $table->date('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('is_percentage')->nullable();
            $table->integer('percentage')->nullable()->default(0);
            $table->decimal('amount',12, 0)->nullable()->default(0);
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
        Schema::dropIfExists('discounts');
    }
}
