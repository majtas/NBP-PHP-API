<?php

namespace App\Controller;

use App\View;

class AppController {
	private View $view;

	public function __construct() {
		$this->view = new View();
	}

	public function getPage($page) {
		$file = "./templates/pages/$page.php";
		file_exists($file) ? $this->view->view($file) : $this->view->view(404);
	}
}
