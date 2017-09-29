<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_users', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
    	    $table->unsignedInteger('role_id');
            $table->unique(['user_id','role_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    	    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('roles_users');
    }
}
