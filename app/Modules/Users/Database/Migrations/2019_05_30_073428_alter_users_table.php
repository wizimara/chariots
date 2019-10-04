<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function($table) {
$table->integer('user_status')->default(0)->after('remember_token');
$table->integer('role_id')->default(0)->after('user_status');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
  $table->dropColumn('user_status');
  $table->dropColumn('role_id');
  });
    }
}
