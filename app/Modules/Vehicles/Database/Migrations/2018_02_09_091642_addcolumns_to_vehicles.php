<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcolumnsToVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('vehicles', function($table) {
        $table->string('transimition')->nullable($value = true);
		$table->string('insurance_type')->nullable($value = true);
		$table->date('insurance_expiry')->nullable($value = true);
		$table->text('vehicle_desc')->nullable($value = true);
		$table->integer('user_id')->nullable($value = true);
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
    $table->dropColumn('transimition');
	$table->dropColumn('insurance_type');
	$table->dropColumn('insurance_expiry');
	$table->dropColumn('vehicle_desc');
	$table->dropColumn('user_id');
});
    }
}
