<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tenants extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tenants', function($table)
		{
		    $table->increments('id');
		    $table->string('first_name')->nullable();
		    $table->string('last_name')->nullable();
		    $table->string('email');
		    $table->string('password');
		    $table->string('nickname')->nullable();
		    $table->string('shower')->nullable();
		    $table->string('pee')->nullable();
		    $table->string('poop')->nullable();
		    $table->dateTime('created_at');
		    $table->dateTime('updated_at');
		    $table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tenants');
	}

}
