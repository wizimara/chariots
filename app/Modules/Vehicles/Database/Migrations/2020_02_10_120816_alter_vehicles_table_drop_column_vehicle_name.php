<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehiclesTableDropColumnVehicleName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('vehicles', function (Blueprint $table) {
   $table->dropColumn('vehicle_name');
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
    $table->string('vehicle_name');
      });
    }
}
