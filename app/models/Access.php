<?php


class Access extends Eloquent {

	public function user() {
		return $this->hasMany('User');
	}

	public function accessuser() {
		return $this->hasMany('AccessUser');
	}

	public static function grant_access($data) {
		foreach($data as $key=>$value) {
			if(strpos($key,'access') !== false ) {

				//REMOVE "-" FROM EVERY INPUTS
				$access_id = explode("-", $key);
				
				$a_u = new AccessUser;
				$a_u->user_id = $data["user_id"];
				$a_u->access_id = $access_id[1];

				$a_u->save();
			}
		}
		return Redirect::back();
	}
}

