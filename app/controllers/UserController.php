<?php


class UserController extends BaseController {



	public function auth() {
		$auth = User::validateLogin( Input::all() );

		return $auth;
	}
}