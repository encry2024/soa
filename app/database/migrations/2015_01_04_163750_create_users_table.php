<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create table
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username', 24);
			$table->string('password');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('type');
			$table->string('email');
			$table->timestamps();
			$table->rememberToken();
		});

		DB::table('users')->insert(
			array(
			'username' => 'admin',
			'firstname' => 'Jacob',
			'lastname' => 'Maloles',
			'password' => Hash::make('123'),
			'type' => 'admin',
			'email' => 'cobmaloles@gmail.com',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
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
