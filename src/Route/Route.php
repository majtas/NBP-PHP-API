<?php

namespace App\Route;

use App\Controller\ControllerManager;

class Route {

	public static function get(string $uri, string $action = '') {
		if(htmlentities(str_replace("/", "", $_SERVER['REQUEST_URI'])) == $uri) {
			echo "tak";
		}
		$args = explode('@', $action);
		$controller = $args[0];
		$method = $args[1];
	 	return new ControllerManager($controller, $method);
	}

}
