<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//code...
		Schema::create('fields', function($table) {
			$table->increments('id');
			$table->string('student_label', 20)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	
		DB::table('fields')->insert(
			array(
				"student_label" => "student_no",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "student_name",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "course",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "payment_mode",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "payment_date1",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "payment_date2",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "payment_date3",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "payment_date4",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "payment_date5",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "prelim",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "midterm",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "pre_final",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "final",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "athletic_fee",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "erm",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "internet_fee",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "nyc",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "physics_lab",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "student_events",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "amadeus",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "Consumables",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "thesis_fee",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "acctg1_set",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "acctg2_set",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "total_assessment",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "dr_dgr",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
			)
		);

		DB::table('fields')->insert(
			array(
				"student_label" => "Total Unpaid DGR",
				"created_at"	=> date('Y-m-d H:i:s'),
				"updated_at"	=> date('Y-m-d H:i:s')
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
