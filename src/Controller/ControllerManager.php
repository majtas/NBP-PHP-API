<?php

namespace App\Controller;

class ControllerManager {
	private $controller;
	private $method;

	public function __construct($controller, $method)
	{
		$this->controller = $controller;
		// require_once("{$this->controller}.php");
		require_once("AppController.php");
		// new $this->controller;
		(new $controller)->test();
		$this->method = $method;
		$this->run();
	}
	private function run() {

	}

}
