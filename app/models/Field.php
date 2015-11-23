<?php


class Field extends Eloquent {

	protected $fillable = array('student_label');

	public function assessmentuser() {
		return $this->belongsTo('AssessmentUser');
	}

	public static function add_field() {
		if (isset($_POST["mytext"]) != '') {
			foreach($_POST["mytext"] as $labelField) {
				if ($labelField != '') {
					$field = Field::firstOrNew(array(
						'student_label'	=>	$labelField,
					));
					$field->save();

					$newField = $field->student_label;

					$audits = new Audit;
					
					//Save the added field on the History
					$audits->user = Auth::user()->username;
					$audits->event = "Adds";
					$audits->field = $newField;
					$audits->object = '-';
					$audits->save();
				}
			}
		}
	}
}