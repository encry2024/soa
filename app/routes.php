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
Route::get('change_password', function() {
	return View::make('container.change_pass');
});

Route::get('unpaid_students', function() {
	return View::make('container.unpaid');
});

Route::get('/', function() {
	return Redirect::to('login');
});

Route::get('forgot_password', 'UserController@forgotPass');

Route::get('login', function() {
	return View::make('container.login');
});

Route::get('add/user', function() {
	return View::make('container.register');
});

Route::group(array('after' => 'no-cache'), function() {
	Route::get('mainpage', function() {
			$course = "";
			$p_d1 = "";
			$p_d2 = "";
			$p_d3 = "";
			$p_d4 = "";
			$p_d5 = "";
			$p1 = "";
			$p2 = "";
			$p3 = "";
			$p4 = "";
			$p5 = "";
		if (Auth::user()->type == "student") {

			$course = "";
			$p_d1 = "";
			$p_d2 = "";
			$p_d3 = "";
			$p_d4 = "";
			$p_d5 = "";
			$p1 = "";
			$p2 = "";
			$p3 = "";
			$p4 = "";
			$p5 = "";

			$p_history			= PaymentHistory::where('student_no', Auth::user()->username)->get();
			$p_h 				= PaymentHistory::where('student_no', Auth::user()->username)->first();
			$assessment_users 	= AssessmentUser::where('student_no', Auth::user()->username)->first();
			$fields 			= Field::all();
			$student 			= AssessmentUser::where('student_no', Auth::user()->username)->first();
			$information 		= Information::where('student_id', $assessment_users->id)->get();

			foreach ($information as $i) {

				if ($i->field->student_label == "course") {
					$course = $i->value;
				}

				if ($i->field->student_label == "payment_date1") {
					if ($i->value == NULL)  {
						$p_d1 = "date has not been set";
					} else  {
						$p_d1 = $i->value;

					}
				}

				if ($i->field->student_label == "payment_date2") {
					$p_d2 = $i->value;
				}

				if ($i->field->student_label == "payment_date3") {
					$p_d3 = $i->value;
				}

				if ($i->field->student_label == "payment_date4") {
					$p_d4 = $i->value;
				}

				if ($i->field->student_label == "payment_date5") {
					$p_d5 = $i->value;
				}

				if ($i->field->student_label == "dr_dgr") {
					$p1 = $i->value;
				}

				if ($i->field->student_label == "prelim") {
					$p2 = $i->value;
				}

				if ($i->field->student_label == "midterm") {
					$p3 = $i->value;
				}

				if ($i->field->student_label == "pre_final") {
					$p4 = $i->value;
				}

				if ($i->field->student_label == "final") {
					$p5 = $i->value;
				}
			}

			return View::make('container.mainpage')	->with('student_info', $student)
													->with('u_a', $assessment_users)
													->with('p_history', $p_history)
													->with('fields', $fields)
													->with('information', $information)
													->with('p_d1', $p_d1)
													->with('p_d2', $p_d2)
													->with('p_d3', $p_d3)
													->with('p_d4', $p_d4)
													->with('p_d5', $p_d5)
													->with('p1', $p1)
													->with('p2', $p2)
													->with('p3', $p3)
													->with('p4', $p4)
													->with('p5', $p5)
													->with('p_h', $p_h)
													->with('course', $course);
		} else {
			$fields 			= Field::all();
			$information 		= Information::all();

			foreach ($information as $i) {
				if ($i->field->student_label == "payment_date1") {
					$p_d1 = $i->value;
				}

				if ($i->field->student_label == "payment_date2") {
					$p_d2 = $i->value;
				}

				if ($i->field->student_label == "payment_date3") {
					$p_d3 = $i->value;
				}

				if ($i->field->student_label == "payment_date4") {
					$p_d4 = $i->value;
				}

				if ($i->field->student_label == "payment_date5") {
					$p_d5 = $i->value;
				}
			}
			return View::make('container.mainpage')	->with('p_d1', $p_d1)
													->with('p_d2', $p_d2)
													->with('p_d3', $p_d3)
													->with('p_d4', $p_d4)
													->with('p_d5', $p_d5);
		}
	});
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
	$course = "";
	//SEARCH FOR USER ID
	$user = User::find($id);
	$user_type = $user->type;
	$user_username = $user->username;
	if ($user_type == "student") {
		$p_d1 = "";
		$p_d2 = "";
		$p_d3 = "";
		$p_d4 = "";
		$p_d5 = "";
		$p1 = "";
		$p2 = "";
		$p3 = "";
		$p4 = "";
		$p5 = "";
		$total_u = 0;

		$p_history			= PaymentHistory::where('student_no', $user_username)->get();
		$p_h 				= PaymentHistory::where('student_no', $user_username)->first();
		$assessment_users 	= AssessmentUser::where('student_no', $user_username)->first();
		$fields 			= Field::all();
		$student 			= AssessmentUser::where('student_no', $user_username)->first();
		$information 		= Information::where('student_id', $assessment_users->id)->get();

		foreach ($information as $i) {
			if ($i->field->student_label == "course") {
				$course = $i->value;
			}

			if ($i->field->student_label == "payment_date1") {
				$p_d1 = $i->value;
			}

			if ($i->field->student_label == "payment_date2") {
				$p_d2 = $i->value;
			}

			if ($i->field->student_label == "payment_date3") {
				$p_d3 = $i->value;
			}

			if ($i->field->student_label == "payment_date4") {
				$p_d4 = $i->value;
			}

			if ($i->field->student_label == "payment_date5") {
				$p_d5 = $i->value;
			}

			if ($i->field->student_label == "dr_dgr") {
				$p1 = $i->value;
			}

			if ($i->field->student_label == "prelim") {
				$p2 = $i->value;
			}

			if ($i->field->student_label == "midterm") {
				$p3 =$i->value;
			}

			if ($i->field->student_label == "pre_final") {
				$p4 =$i->value;
			}

			if ($i->field->student_label == "final") {
				$p5 =$i->value;
			}

			if ($i->field->student_label == "Total Unpaid DGR")  {
				$total_u = $i->value;
			}

		}
		return View::make('container.user')	->with('user', $user)
											->with('u_a', $assessment_users)
											->with('p_history', $p_history)
											->with('student_info', $student)
											->with('u_a', $assessment_users)
											->with('p_history', $p_history)
											->with('fields', $fields)
											->with('information', $information)
											->with('p_d1', $p_d1)
											->with('p_d2', $p_d2)
											->with('p_d3', $p_d3)
											->with('p_d4', $p_d4)
											->with('p_d5', $p_d5)
											->with('p1', $p1)
											->with('p2', $p2)
											->with('p3', $p3)
											->with('p4', $p4)
											->with('p5', $p5)
											->with('p_h', $p_h)
											->with('course', $course)
											->with('t_u', $total_u);
	} else {

		return View::make('container.user')->with('user', $user)->with('date', $date);
	}
});

Route::get('register/{student_no}/student', function( $student_no ) {
	$assessment_user = AssessmentUser::where('student_no', $student_no)->first();

	return View::make('container.student_reg')->with('student_info', $assessment_user);
});

Route::get('sentry/student', function() {

	return View::make('container.student_entry');
});

Route::get('student/data/information', function() {
	$fields = Field::all();

	return View::make('container.field')->with('fields', $fields);
});

Route::get('print/student/{id}/soa', function ( $id ) {
	$data['p1'] 				= "";
	$data['p2'] 				= "";
	$data['p3'] 				= "";
	$data['p4'] 				= "";
	$data['p5'] 				= "";
	$data['student_course'] 	= "";
	$data['student'] 			= AssessmentUser::where('student_no', $id)->first();
	$data['payment_history'] 	= PaymentHistory::where('student_no', $id)->get();
	$data['p_history'] 			= PaymentHistory::where('student_no', $id)->first();
	
	$information 				= Information::where('student_id', $data['student']->id)->get();

	foreach ( $information as $info ) {
		if ($info->field->student_label == "course") {
			$data['student_course'] = $info->value;
		}

		if ($info->field->student_label == "payment_date1") {
				$data["p_d1"] = $info->value;
		}

		if ($info->field->student_label == "payment_date2") {
			$data["p_d2"] = $info->value;
		}

		if ($info->field->student_label == "payment_date3") {
			$data["p_d3"] = $info->value;
		}

		if ($info->field->student_label == "payment_date4") {
			$data["p_d4"] = $info->value;
		}

		if ($info->field->student_label == "payment_date5") {
			$data["p_d5"] = $info->value;
		}

		if ($info->field->student_label == "dr_dgr") {
			$data["p1"] = $info->value;
		}

		if ($info->field->student_label == "prelim") {
			$data["p2"] = $info->value;
		}

		if ($info->field->student_label == "midterm") {
			$data["p3"] = $info->value;
		}

		if ($info->field->student_label == "pre_final") {
			$data["p4"] = $info->value;
		}

		if ($info->field->student_label == "final") {
			$data["p5"] = $info->value;
		}
	}

	$pdf = PDF::loadView('soa_receipt.print', $data);
	return $pdf->stream("AssessmentUser.pdf");
});

Route::get('logs', function() {
	$audits = Audit::all();
	return View::make('container.history')->with('audits', $audits);
});

Route::get('getHistory', function() {
	return Audit::all()->toJson();
});




#ANYROUTE

Route::any('export/database', function() {
	$a_id = "";
	//$field_values = array();
	# Set process time to no limit
	set_time_limit(0);
	# Pass the file to variable file
	$file = Input::file( 'file' );
	# Move the file to storage/uploads
	$file->move(storage_path() . '/uploads', $file->getClientOriginalName());

	# Retrieve data as arrays
	$sheets = Excel::load( storage_path() . '/uploads/' . $file->getClientOriginalName())->toArray();

	# Retrieve all Fields
	$fields = Field::all();
	# Foreach data on sheets
	# If you have more than one sheet;
	# You need to have 2 foreach; The first foreach is foreach sheet and the second foreach
	# is for the data...
	DB::delete('DELETE FROM soa_assessment_users');
	DB::delete('DELETE FROM soa_information');
	foreach ($sheets as $data) {
		# Check the $data->student_no coming from the xls...
		$a_u = AssessmentUser::where('student_no', $data['student_no'])->first();
		# Count the result..
		# If it returns 0 result
		if( count($a_u) == 0) {
			# Save
			$a_user = AssessmentUser::firstOrNew(array(
				"student_no" 		=> $data['student_no'],
				"student_name" 		=> $data['student_name'],
				"course"			=> $data['course']
			));
			$a_user->save();
			# Retrieve ID
			$a_id = $a_user->id;

			# Create an empty array variable
			$field_values = array();

			foreach ($fields as $field) {
				# Create arrays of fields to be inserted

				$field_name = $field->student_label;

				# Check if the label exists from the xls
				if (array_key_exists($field_name, $data)) {
					$field_values[] = array(
						'student_id'=>	$a_id,
						'field_id'	=>	$field->id,
						'value'		=>	$data[$field_name],
					);

					foreach ($field_values as $f_v) {
						# Shorthand if
						# if $f_v['value'] is null display -
						# else display it's value
						if ($f_v['value'] != '') {
							# Create information
							$information = Information::firstOrNew(array(
								'student_id' => $f_v['student_id'],
								'field_id' => $f_v['field_id'],
								'value' => $f_v['value'],
							));
							
						} else {
							$information = Information::firstOrNew(array(
								'student_id' => $f_v['student_id'],
								'field_id' => $f_v['field_id'],
								'value' => "-"
								)
							);
						}
						$information->save();
					}
				}
			}
		}
	}

	$audits = new Audit;
	$audits->user = Auth::user()->lastname . ', ' . Auth::user()->firstname;
	$audits->event = "imported";
	$audits->field = "excel";
	$audits->object = $file->getClientOriginalName();
	$audits->save();

	return Redirect::back()->with('msg', $file->getClientOriginalName() . " has been successfully imported");
});

Route::any('export/paymenthistory', function() {
	set_time_limit(0);
	$file = Input::file( 'file' );
	$file->move(storage_path() . '/uploads', $file->getClientOriginalName());
	
	$rows = Excel::load( storage_path() . '/uploads/' . $file->getClientOriginalName())->get();

	$payment_history = PaymentHistory::where('deleted_at', NULL)->get();

	foreach ($payment_history as $p_history) {
		$p_history->delete();
	}

	foreach ($rows as $data) {
		//IF NO STUDENT FOUND; CREATE
		$p_h = new PaymentHistory;
		$p_h->student_no 		= $data->student_no;
		$p_h->student_no 		= $data->student_no;
		$p_h->or_no				= $data->or_no;
		$p_h->school_year		= $data->school_year;
		$p_h->sem				= $data->sem;
		$p_h->amount			= $data->amount;
		$p_h->date_of_payment	= $data->date_of_payment;
		$p_h->save();
	}

	$audits = new Audit;
	$audits->user = Auth::user()->lastname . ', ' . Auth::user()->firstname;
	$audits->event = "imported";
	$audits->field = "excel";
	$audits->object = $file->getClientOriginalName();
	$audits->save();

	return Redirect::back()->with('msg', $file->getClientOriginalName() . " has been successfully imported");
});











#POST
Route::post('f_password', 'UserController@retrievePassword');
Route::post('tryRegister', 'UserController@registerUser');
Route::post('authenticate', 'UserController@auth');
Route::post('student/register', 'UserController@registerStudent');
Route::post('update/due_date', 'InformationController@updateDue');
Route::post('grant_access', 'AccessController@grantAccess');
Route::post('update/student/{id}', 'UserController@updateStudent');

Route::post('student/access', function() {
	$assessment_user = AssessmentUser::where('student_no', Input::get('student_no'))->first();

	if (count($assessment_user) != 0) {
		return Redirect::to('register/'.$assessment_user->student_no.'/student');
	} else {
		return View::make('Student Number');
	}
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

Route::get('fetch/students', function( ) {
	$json = array();
	$users = User::where('type', 'student')->get();
	foreach ($users as $data) {
		$json[] = array(
			'id' => $data->id,
			'users' => $data->lastname . ', ' . $data->firstname,
			'no' => $data->phonenumber
		);
	}
	return json_encode($json);
});

Route::get('fetch/{student_no}/payment_breakdown', function( $student_no ) {
	$json = array();
	$users = AssessmentUser::where('student_no', $student_no)->first();
	$information = Information::where('student_id', $users->id)->get();
	foreach ($information as $data) {
		$fields = Field::where('id', $data->field_id)->get();
		foreach ($fields as $field) {
			if ($field->student_label != "student_no" AND $field->student_label != "student_name" AND
				$field->student_label != "course" AND $field->student_label != "payment_mode" AND
				$field->student_label != "payment_date1" AND $field->student_label != "payment_date2" AND
				$field->student_label != "payment_date3" AND $field->student_label != "payment_date4" AND
				$field->student_label != "payment_date5" AND $field->student_label != "prelim" AND
				$field->student_label != "midterm" AND $field->student_label != "pre_final" AND
				$field->student_label != "final" AND $field->student_label != "dr_dgr" AND 
				$field->student_label != "total_assessment") {
				$json[] = array(
					'breakdown' => $field->student_label,
					'dgr' => $data->value,
				);
			}
		}
	}
	return json_encode($json);
});


Route::get('fetch/payment_breakdown', function() {
	$json = array();
	$users = AssessmentUser::where('student_no', Auth::user()->username)->first();
	$information = Information::where('student_id', $users->id)->get();
	foreach ($information as $data) {
		$fields = Field::where('id', $data->field_id)->get();
		foreach ($fields as $field) {
			if ($field->student_label != "student_no" AND $field->student_label != "student_name" AND
				$field->student_label != "course" AND $field->student_label != "payment_mode" AND
				$field->student_label != "payment_date1" AND $field->student_label != "payment_date2" AND
				$field->student_label != "payment_date3" AND $field->student_label != "payment_date4" AND
				$field->student_label != "payment_date5" AND $field->student_label != "prelim" AND
				$field->student_label != "midterm" AND $field->student_label != "pre_final" AND
				$field->student_label != "final" AND $field->student_label != "dr_dgr" AND 
				$field->student_label != "total_assessment") {
				$json[] = array(
					'breakdown' => $field->student_label,
					'dgr' => $data->value,
				);
			}
		}
	}
	return json_encode($json);
});


Route::get('fetch/payment_history', function() {
	$json = array();
	$users = PaymentHistory::withTrashed()->where('student_no', Auth::user()->username)->get();

	foreach ( $users as $user ) {
		$json[] = array(
			'or_no'		=> $user->or_no,
			'date_paid' => date('F/d/Y', strtotime($user->date_of_payment)),
			'school_year' => $user->school_year,
			'sem' => $user->sem,
			'amt' => $user->amount,
		);
	}
	return json_encode($json);
});

Route::get('fetch/unpaid', function() {
	$json = array();
	$users = AssessmentUser::all();

	foreach ( $users as $user ) {
		$information = Information::where('student_id', $user->id)->get();
		foreach ($information as $info) {
			if ($info->field->student_label == "Total Unpaid DGR")
			$json[] = array(
				'student_no'		=> $user->student_no,
				'student_name' 		=> $user->student_name,
				'unpaid' 			=> $info->value,
			);
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


Route::post('add/field', "FieldController@addField");


Route::any('notify_students', function() {
	$users = User::where('type', 'student' )->get();
	$total_balance = 0;
	$last_date = "";

	foreach ($users as $u) {
		$username = $u->username;
		$assessment_users = AssessmentUser::where('student_no', $username)->first();
		$information = Information::where('student_id', $assessment_users->id)->get();
		$payment_history = PaymentHistory::where('student_no', $u->username)->first();
		foreach ($information as $info) {
			if ($info->field->student_label == "Total Unpaid DGR") {
				$total_balance = $info->value;
			}
		}
		$date = date('F d, Y', strtotime($payment_history->updated_at));
		$mobile_number = $u->phonenumber;
		$send_1 = 'Hi ' . $u->lastname . ', ' . $u->firstname . '.';
		$send_2 = 'your balance as of today '. date('Y-m-d') . ' is';
		$uniform_txt = $send_1 . $send_2 . String::formatMoney((double)$total_balance, 'Php');

		
		$gsm_send_sms = new SendGsm();
		$gsm_send_sms->debug = true;
		$gsm_send_sms->port = 'COM5';
		$gsm_send_sms->baud = 115200;
		$gsm_send_sms->init();

		$status = $gsm_send_sms->send($mobile_number,$uniform_txt);
		$gsm_send_sms->close();

		sleep(5);
	}
	return Redirect::to('/mainpage');
});

Route::post('ch_password', function() {
	$user = User::find(Auth::user()->id);
	$user->password = Hash::make(Input::get('pass'));
	$user->save();

	Auth::logout();
	return Redirect::to('/');
});