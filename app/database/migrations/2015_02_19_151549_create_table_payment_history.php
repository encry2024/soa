<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaymentHistory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_history',function($table){
			$table->increments('id');
			$table->string('student_no');
			$table->string('or_no');
			$table->string('school_year');
			$table->string('sem');
			$table->string('amount');
			$table->string('date_of_payment');
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
		//
	}

}
