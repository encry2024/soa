<?php


class AccessUser extends Eloquent {


	public function user() {
		return $this->belongsTo('User');
	}

	public function access() {
		return $this->belongsTo('Access');
	}

}