<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcolumnsFeaturesVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
       Schema::table('vehicles', function($table) {
        $table->string('location')->nullable($value = true);
		$table->string('features')->nullable($value = true);
	
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('vehicles', function (Blueprint $table) {
    $table->dropColumn('location');
	$table->dropColumn('features');

});
    }
}
