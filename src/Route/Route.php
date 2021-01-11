<?php

namespace App\Route;

use Closure;

class Route {

	private static $routes = [];

	public static function get(string $uri, Closure $callback) {
		if($_SERVER['REQUEST_METHOD'] === 'GET') {
			$uri = trim($uri, '/');
			return (static::$routes[$uri] = $callback);
		}
	}

	public static function post(string $uri, Closure $callback) {
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$uri = trim($uri, '/');
			return static::$routes[$uri] = $callback;
		}
	}

	public static function dispatch()
	{
		$request_uri = trim($_SERVER['REQUEST_URI'], '/');
		if(array_key_exists($request_uri, static::$routes))
			return call_user_func(static::$routes[$request_uri]);
		exit("Routing nie został przypisany do szukanej ścieżki");
	}

}
