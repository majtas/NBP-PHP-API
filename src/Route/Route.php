<?php

namespace App\Route;

use App\Controller\ControllerManager;
use Closure;

class Route {

	private $routes = [];

	public function get(string $uri, Closure $callback) {
		$uri = trim($uri, '/');
		$this->routes[$uri] = $callback;
		$this->dispatch($_SERVER['REQUEST_URI']);
	}

	private function dispatch($uri)
	{
		$uri = trim($uri, '/');
		if(array_key_exists($uri, $this->routes))
			echo call_user_func($this->routes[$uri]);
		else
			http_response_code(404);
	}

}
