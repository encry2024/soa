<?php


class Information extends Eloquent {

	protected $table = 'information';

	protected $fillable = array('student_id', 'field_id', 'value');

	public function field() {
		return $this->belongsTo('Field');
	}

	public static function update_due() {
		$information = Information::all();
		$fields		 = Field::all();

		foreach ($information as $info) {
			if ($info->field->student_label == "payment_date1") {
				$info->value = Input::get('down_payment');
				$info->save();
			}

			if ($info->field->student_label == "payment_date2") {
				$info->value = Input::get('sec_payment');
				$info->save();
			}

			if ($info->field->student_label == "payment_date3") {
				$info->value = Input::get('thrd_payment');
				$info->save();
			}

			if ($info->field->student_label == "payment_date4") {
				$info->value = Input::get('fth_payment');
				$info->save();
			}

			if ($info->field->student_label == "payment_date5") {
				$info->value = Input::get('ffth_payment');
				$info->save();

				
			}
		}

		$audits = new Audit;
		$audits->user 	= Auth::user()->lastname . ', ' . Auth::user()->firstname;
		$audits->event 	= "updates";
		$audits->field 	= "student's &#8594; due date";
		$audits->object =   Input::get('down_payment') . "<br>" .
							Input::get('sec_payment') . "<br>" .
							Input::get('thrd_payment') . "<br>" .
							Input::get('fth_payment') . "<br>" .
							Input::get('ffth_payment') . "<br>";
		$audits->save();

		return Redirect::back()->with('msg', " Student's due date has been successfully updated...");
	}
}