<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsStatusTrackerInsuranceExpiryVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName='vehicles', $columnName='status',
    $columnName1='tracker',  $columnName2='insurance_expiry';
    public function up()
    {
      Schema::table($this->tableName, function (Blueprint $table) {
      $table->dropColumn($this->columnName);
      $table->dropColumn($this->columnName1);
      $table->dropColumn($this->columnName2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
