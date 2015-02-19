<?php


class AssessmentUser extends Eloquent {

	protected $table = 'assessment_users';

	protected $fillable = array('student_no', 'student_name', 'course', 'payment_mode','athletic_fee',
								'erm','internet_fee','nyc','physics_lab','student_events','amadeus',
								'consumables','thesis_fee','acctg1_set','acctg2_set','total_assessment',
								'prelim','midterm','pre_final','final');
	

}