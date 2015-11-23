<?php


class FieldController extends BaseController {



	public function addField() {
		$field = Field::add_field( Input::all() );

		return $field;
	}
}