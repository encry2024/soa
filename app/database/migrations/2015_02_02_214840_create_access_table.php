<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accesses',function($table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});

		DB::table('accesses')->insert(
			array(
			'name' => 'print',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);

		DB::table('accesses')->insert(
			array(
			'name' => 'add',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);

		DB::table('accesses')->insert(
			array(
			'name' => 'delete',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);

		DB::table('accesses')->insert(
			array(
			'name' => 'update',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('accesses')->insert(
			array(
			'name' => 'view',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			)
		);
		DB::table('accesses')->insert(
			array(
			'name' => 'access',
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
