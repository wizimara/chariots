<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMakeIdColumnVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName='vehicles', $columnName='make_id';
    public function up()
    {
      Schema::table($this->tableName, function (Blueprint $table) {
        if (!Schema::hasColumn($this->tableName, $this->columnName)) {
            $table->bigInteger($this->columnName);

        }
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table($this->tableName, function (Blueprint $table) {
        $table->dropColumn($this->columnName);
    });
    }
}