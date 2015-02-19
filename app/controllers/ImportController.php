<?php

class ImportController extends \Maatwebsite\Excel\Files\ExcelFile {




	public function getFile() {
		// Import a user provided file
		$file = Input::get('file')->move(__DIR__.'/storage/');
		$filename = $this->importFile($file);

		// Return it's location
		return View::make('container.xls')->with('results', $filename);
	}

}