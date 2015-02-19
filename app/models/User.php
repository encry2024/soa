<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = array('username', 'firstname', 'lastname', 'type', 'password');

	public function access() {
		return $this->belongsTo('Access');
	}

	public function paymentuser() {
		return $this->hasOne('PaymentUser');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	// CHECK USER CREDENTIALS
	public static function validateLogin($data) {
		$rules = array(
			'username' => 'required',
			'password' => 'required'
		);

		$validation =  Validator::make(Input::all(),$rules);

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('auth/login')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			$credentials = array(
			  'username' => Input::get('username'),
			  'password' => Input::get('password')
			);
			if (Auth::attempt($credentials)) {
					return Redirect::to('mainpage');
			} else {
				/* with('flash_error', 'Your username/password was incorrect.')
				* Pass the error message 'Your username/password was incorrect' 
				* to flash_error variable.
				* 
				* withInput();
				* It retains user input
				*/
				return Redirect::to('login')
				->with('flash_error', 'Your username/password was incorrect')
				->withInput();
			}
		}
	}
}


