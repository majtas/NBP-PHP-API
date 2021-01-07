<?php

use App\Controller\AppController;
use App\Route\Route;

$app = new AppController();
$router = new Route();

$router->get('/', function() use ($app) {
	$app->test();
});

$app->run();

