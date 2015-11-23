<?php


class AssessmentUser extends Eloquent {

	protected $table = 'assessment_users';

	protected $fillable = array('student_no', 'student_name');
	
	public function field() {
		return $this->hasMany('Field');
	}

}