<?php


class PaymentHistory extends Eloquent {

	protected $table = 'payment_history';

	protected $fillable = array('student_no', 'or_no','school_year','sem','amount', 'date_of_payment');
	

}