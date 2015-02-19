<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('assessment_users', function($table){
			$table->increments('id');
			$table->string('student_no');
			$table->string('student_name');
			$table->string('course')->nullable();
			$table->string('payment_mode')->nullable();
			$table->string('athletic_fee')->nullable();
			$table->string('erm')->nullable();
			$table->string('internet_fee')->nullable();
			$table->string('nyc')->nullable();
			$table->string('physics_lab')->nullable();
			$table->string('student_events')->nullable();
			$table->string('amadeus')->nullable();
			$table->string('consumables')->nullable();
			$table->string('thesis_fee')->nullable();
			$table->string('acctg1_set')->nullable();
			$table->string('acctg2_set')->nullable();
			$table->string('total_assessment')->nullable();
			$table->string('prelim')->nullable();
			$table->string('midterm')->nullable(); 
			$table->string('pre_final')->nullable();
			$table->string('final')->nullable();
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
