<?php


class AccessController extends BaseController {



	public function grantAccess() {
		$access = Access::grant_access( Input::all() );

		return $access;
	}
}