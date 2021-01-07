<?php

namespace App\Route;

use Closure;

class Route {

	private $routes = [];

	public function get(string $uri, Closure $callback) {
		$uri = trim($uri, '/');
		$this->routes[$uri] = $callback;
	}

	public function dispatch()
	{
		$request_uri = trim($_SERVER['REQUEST_URI'], '/');
		if(array_key_exists($request_uri, $this->routes))
			return call_user_func($this->routes[$request_uri]);
		exit("Routing nie został przypisany do szukanej ścieżki");
	}

}
