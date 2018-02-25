<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alteringpickuptime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('confirmedrentals', function($table) {
        $table->string('pick_up_time')->change();


   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('confirmedrentals', function (Blueprint $table) {

$table->time('pick_up_time')->change();


});
    }
}
