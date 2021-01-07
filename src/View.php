<?php

namespace App;

class View {

	private $filePath = "./templates/";

	public function view($page, $args = [], $ext = '.php') {
		$file = $page.$ext;
		include_once($this->filePath . $file);
	}
}
