<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('pricings', function($table) {
        $table->dropColumn('totalprice');
        $table->dropColumn('tripfee');
        $table->dropColumn('totaltriprice');


   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('pricings', function($table) {
        $table->decimal('totalprice',12, 0);
        $table->decimal('tripfee',12, 0);
        $table->decimal('totaltriprice',12, 0);

   });
    }
}
