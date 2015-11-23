<?php


use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PaymentHistory extends Eloquent {

	use SoftDeletingTrait;
	protected $table = 'payment_history';
	protected $softDelete = true;
	protected $dates = ['deleted_at'];

	protected $fillable = array('student_no', 'or_no','school_year','sem','amount', 'date_of_payment');
	

}