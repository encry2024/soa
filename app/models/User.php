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
	

	public static function getPassword() {
		$values = "";
		$targetArray = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
							'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$rand = array_rand($targetArray, 12);

		foreach ($rand as $key => $value) {
		    $values .= $targetArray[$value];
		}

		return $values;
	}


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
									$audits = new Audit;
					
					//Save the added field on the History
					$audits->user = Auth::user()->username;
					$audits->event = "Logged in";
					$audits->field = "user type:" . " " . Auth::user()->type;
					$audits->object = '-';
					$audits->save();
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

	#CODE FOR REGISTER USER
	public static function reg_user() {
		//get all data
		//datas to validate
		//rules
		$rules = array(
			'username' => 'required|unique:users,username|alpha_num',
			'password' => 'required|confirmed',
			'firstname' => 'required',
			'lastname' => 'required',
			'password_confirmation' => 'required|min:6',
			'email'	=> 'required|unique:users,email'
		);

		//create validation instance
		$validation = Validator::make(Input::all(), $rules);

		//check if validation successful
		if($validation->fails()) {
			return Redirect::back()
				->withErrors($validation)->withInput();
			//return var_dump($validation->messages());
		} else {
			$user = new User;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email 	= Input::get('email');
			$user->type = 'cashier';
			$user->save();

			return Redirect::back()->with('success_message', 'User has been successfully registered!');
		}
	}

	# CODE FOR REGISTER STUDENT
	public static function register_student() {
		$rules = array(
			'password' => 'required|confirmed',
			'password_confirmation' => 'required|min:6'
		);

		//create validation instance
		$validation = Validator::make(Input::all(), $rules);

		//check if validation successful
		if($validation->fails()) {
			return Redirect::back()
				->withErrors($validation)->withInput();
			//return var_dump($validation->messages());
		} else {
			$field_Information = explode(",", Input::get('name'));
			$lastname = $field_Information[0];
			$firstname = $field_Information[1];

			$user = User::firstOrNew(array(
				'username'	=>	Input::get('username'),
				'firstname'	=>	$firstname,
				'lastname'	=>	$lastname,
				'password'	=>	Hash::make(Input::get('password'))
			));
			$user->phonenumber = Input::get('number');
			$user->type = 'student';
			$user->save();
			//}
			return Redirect::to('/');
		}
	}

	# CODE FOR FORGOT PASSWORD
	public static function fgt_password() {
		$new_pass = User::getPassword();

		$email = Input::get('email');
		$users = User::where('email', $email)->first();

		$users->password = Hash::make($new_pass);
		
		Mail::send('container.mail',  array('username'=>$users->username, 'password'=>$new_pass), function($message) {
			$message->to(Input::get('email'))->subject('Forgot Password');
		});
		$users->save();
		return Redirect::to('/');
	}

	public static function update_student( $id ) {
		$rules = array(
			'phonenumber' => 'required',
			'email' => 'required'
		);

		//create validation instance
		$validation = Validator::make(Input::all(), $rules);

		//check if validation successful
		if($validation->fails()) {
			return Redirect::back()
				->withErrors($validation)->withInput();
			//return var_dump($validation->messages());
		} else {

			$user = User::find($id);
			$user->phonenumber = Input::get('phnumber');
			$user->email = Input::get('email');
			$user->save();
			//}
			return Redirect::to('/');
		}

	}
}


