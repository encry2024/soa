<?php


class InformationController extends BaseController {



	public function updateDue() {
		$retData = Information::update_due();

		return $retData;
	}
}