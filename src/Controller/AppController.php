<?php

namespace App\Controller;

use App\View;

class AppController {
	private View $view;

	public function __construct() {
		$this->view = new View();
	}

	public function run()
	{
		$this->view->view('template');
	}

	public function test()
	{
		echo "Bążur";
	}

}
