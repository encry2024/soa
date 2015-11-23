<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('access_users',function($table){
			$table->increments('id');
			$table->string('user_id');
			$table->string('access_id');
			$table->timestamps();
			$table->rememberToken();
		});
		// AFTER CREATING DATABASE.
		DB::table('access_users')->insert(
			array(
			'user_id' => '1',
			'access_id' => '1',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('access_users')->insert(
			array(
			'user_id' => '1',
			'access_id' => '2',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('access_users')->insert(
			array(
			'user_id' => '1',
			'access_id' => '3',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('access_users')->insert(
			array(
			'user_id' => '1',
			'access_id' => '4',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('access_users')->insert(
			array(
			'user_id' => '1',
			'access_id' => '5',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('access_users')->insert(
			array(
			'user_id' => '1',
			'access_id' => '6',
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
