<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


#GET
Route::get('/', function() {
	return Redirect::to('login');
});

Route::get('login', function() {
	return View::make('container.login');
});

Route::get('add/user', function() {
	return View::make('container.register');
});

Route::get('mainpage', function() {
	
	$student = AssessmentUser::where('student_no', Auth::user()->username)->first();
	return View::make('container.mainpage')->with('student_info', $student);

});

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');
});

Route::get('add', function() {
	if (Auth::user()->type == "admin" OR Auth::user()->type == "cashier") {
		return View::make('container.add');
	} else {
		return View::make('Authentication');
	}
});

Route::get('user/{id}/profile', function( $id ) {
	//SEARCH FOR USER ID
	$user = User::find($id);

	if ($user->type == "student") {
		$assessment_users 	= AssessmentUser::where('student_no', $user->username)->first();
		$p_history	= PaymentHistory::where('student_no', $user->username)->first();
		return View::make('container.user')
		->with('user', $user)
		->with('u_a', $assessment_users)
		->with('p_history', $p_history);
	} else {
		return View::make('container.user')
		->with('user', $user);
	}
});

Route::get('register/{student_no}/student', function( $student_no ) {
	$assessment_user = AssessmentUser::where('student_no', $student_no)->first();

	return View::make('container.student_reg')->with('student_info', $assessment_user);
});

Route::get('sentry/student', function() {

	return View::make('container.student_entry');
});

#ANYROUTE

Route::any('import/data', function(){

	return View::make('container.xls');
});


#JSONS

Route::any('export/database', function() {
	set_time_limit(0);
	$file = Input::file( 'file' );
	$file->move(storage_path() . '/uploads', $file->getClientOriginalName());

	$rows = Excel::load( storage_path() . '/uploads/' . $file->getClientOriginalName())->get();
	foreach ($rows as $data) {
		$a_u = AssessmentUser::where('student_no', $data->student_no)->first();
		if( count($a_u) == 0) {
			//IF NO STUDENT FOUND; CREATE
			$a_user = AssessmentUser::firstOrNew(array(
				"student_no" 		=> $data->student_no,
				"student_name" 		=> $data->student_name,
				"course" 			=> $data->course,
				"payment_mode" 		=> $data->payment_mode,
				"athletic_fee" 		=> $data->athletic_fee,
				"erm"				=> $data->erm,
				"internet_fee"		=> $data->internet_fee,
				"nyc"				=> $data->nyc,
				"physics_lab"		=> $data->physics_lab,
				"student_events"	=> $data->student_events,
				"amadeus"			=> $data->amadeus,
				"consumables"		=> $data->consumables,
				"thesis_fee"		=> $data->thesis_fee,
				"acctg1_set"		=> $data->acctg1_set,
				"acctg2_set"		=> $data->acctg2_set,
				"total_assessment"	=> $data->total_assessment,
				"prelim"			=> $data->prelim,
				"midterm"			=> $data->midterm,
				"pre_final"			=> $data->pre_final,
				"final"				=> $data->final
			));
			$a_user->save();
		} else {
			//UPDATE INFORMATION IF FOUND
			$a_u->student_no 		= $data->student_no;
			$a_u->student_name 		= $data->student_name;
			$a_u->course 			= $data->course;
			$a_u->payment_mode 		= $data->payment_mode;
			$a_u->athletic_fee 		= $data->athletic_fee;
			$a_u->erm 				= $data->erm;
			$a_u->internet_fee 		= $data->internet_fee;
			$a_u->nyc 				= $data->nyc;
			$a_u->physics_lab 		= $data->physics_lab;
			$a_u->student_events 	= $data->student_events;
			$a_u->amadeus 			= $data->amadeus;
			$a_u->consumables 		= $data->consumables;
			$a_u->thesis_fee 		= $data->thesis_fee;
			$a_u->acctg1_set 		= $data->acctg1_set;
			$a_u->acctg2_set 		= $data->acctg2_set;
			$a_u->total_assessment 	= $data->total_assessment;
			$a_u->prelim 			= $data->prelim;
			$a_u->midterm 			= $data->midterm;
			$a_u->pre_final 		= $data->pre_final;
			$a_u->final 			= $data->final;

			$a_u->save();
		}
	}
	return Redirect::back()->with('msg', "Statement of Account Template has been successfully imported");


});

Route::any('export/paymenthistory', function() {
	set_time_limit(0);
	$file = Input::file( 'file' );
	$file->move(storage_path() . '/uploads', $file->getClientOriginalName());

	$rows = Excel::load( storage_path() . '/uploads/' . $file->getClientOriginalName())->get();
	foreach ($rows as $data) {
		//IF NO STUDENT FOUND; CREATE
		$p_h = PaymentHistory::firstOrNew(array(
			"student_no" 		=> $data->student_no,
			"or_no"				=> $data->or_no,
			"school_year"		=> $data->school_year,
			"sem"				=> $data->sem,
			"amount"			=> $data->amount,
			"date_of_payment"	=> $data->date_of_payment
		));
		$p_h->save();
	}
	return Redirect::back()->with('msg', "Statement of Account Template has been successfully imported");


});

#POST

Route::post('tryRegister', function() {
	//get all data
	//datas to validate
	//rules
	$rules = array(
		'username' => 'required|unique:users,username|alpha_num',
		'password' => 'required|confirmed',
		'firstname' => 'required',
		'lastname' => 'required',
		'password_confirmation' => 'required',
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
		$user->type = 'Cashier';
		$user->save();

		return Redirect::back()->with('success_message', 'User has been successfully registered!');
	}
});

Route::post('authenticate', 'UserController@auth');

Route::post('grant_access', 'AccessController@grantAccess');

Route::post('update/{id}/balance', function( $id ) {
	$payment_user = PaymentUser::where('user_id',$id)->first();

	if (count($payment_user) == 0) {
		$new_pu = new PaymentUser;
		$new_pu->user_id = $id;
		$new_pu->outstanding_balance = Input::get('outstanding_balance');
		$new_pu->total_balance = Input::get('total');
		$new_pu->save();

		return Redirect::back();
	}

	// PASS DATA VALUES TO VARIABLE
	$os_balance = $payment_user->outstanding_balance;
	$ttl = $payment_user->total_balance;

	// GET INPUT FROM PAYMENT TEXTBOX
	$payment = Input::get('payment');

	// CALCULATE OUTSTANDING BALANCE AND TOTAL BALANCE
	$total_os_b = $os_balance - $payment;
	$total_ttl_bal = $ttl - $payment;

	// PASS RESULT TO THE DATA COLUMNS
	$payment_user->outstanding_balance = $total_os_b;
	$payment_user->total_balance = $total_ttl_bal;

	$payment_user->save();
});

Route::post('student/access', function() {
	$assessment_user = AssessmentUser::where('student_no', Input::get('student_no'))->first();

	if (count($assessment_user) != 0) {
		return Redirect::to('register/'.$assessment_user->student_no.'/student');
	} else {
		return View::make('Student Number');
	}
});

Route::post('student/register', function() {
	// if(strpos(Input::get('name'), 'field') !== false) {
		$field_Information = explode(",", Input::get('name'));
		$lastname = $field_Information[0];
		$firstname = $field_Information[1];

		$user = User::firstOrNew(array(
			'username'	=>	Input::get('username'),
			'firstname'	=>	$firstname,
			'lastname'	=>	$lastname,
			'password'	=>	Hash::make(Input::get('password'))
		));
		$user->type = 'student';
		$user->save();
	//}
	return Redirect::to('/');
});


#JSONs

Route::get('fetch/users', function() {
	$json = array();
	$user = User::all();
	foreach ($user as $u) {
		if (Auth::user()->type == "admin") {
			if ($u->type != "admin") {
				$json[] = array(
					'id' => $u->id,
					'users' => $u->firstname . " " . $u->lastname,
					'roles' => $u->type,
					'created_at' => date('M d, Y [h:i A D]', strtotime($u->created_at) ),
				);
			}
		} else if (Auth::user()->type == "Cashier") {
			if ($u->type == "student") {
				$json[] = array(
					'id' => $u->id,
					'users' => $u->firstname . " " . $u->lastname,
					'roles' => $u->type,
					'created_at' => date('M d, Y [h:i A D]', strtotime($u->created_at) ),
				);
			}
		} else {

		}
	}
	return json_encode($json);
});

Route::post('student/{id}/update/payment', function( $id ) {
	$a_u = AssessmentUser::find($id);
	$a_u->payment_date1 = Input::get('p_d1');
	$a_u->payment_date2 = Input::get('p_d2');
	$a_u->payment_date3 = Input::get('p_d3');
	$a_u->payment_date4 = Input::get('p_d4');
	$a_u->payment_date5 = Input::get('p_d5');
	$a_u->save();

	return Redirect::back();
});