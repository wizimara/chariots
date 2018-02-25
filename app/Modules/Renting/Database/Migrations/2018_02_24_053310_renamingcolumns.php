<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renamingcolumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('confirmedrentals', function($table) {
         $table->time('pick_up_time')->change();
		 $table->date('pick_up_date');
		
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
    
	$table->date('pick_up_time')->change();
	$table->dropColumn('pick_up_date');
	
});
    }
}
