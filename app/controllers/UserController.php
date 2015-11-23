<?php


class UserController extends BaseController {



	public function auth() {
		$auth = User::validateLogin( Input::all() );

		return $auth;
	}

	public function registerUser() {
		$register_user = User::reg_user();

		return $register_user;
	}

	public function registerStudent() {
		$reg_student = User::register_student();

		return $reg_student;
	}

	public function forgotPass() {
		return View::make('container.forgot_password');
	}

	public function retrievePassword() {
		$getPass = User::fgt_password();

		return $getPass;
	}

	public function updateStudent( $id ) {
		$update_std = User::update_student( $id );

		return $update_std;
	}
}