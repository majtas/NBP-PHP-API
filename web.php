<?php

use App\Controller\AppController;
use App\Route\Route;

$app = new AppController();
$router = new Route();

$router->get('/', function() use ($app) {
	$app->getPage('home');
});

$router->get('/kurs', function() use ($app) {
	$app->getPage('kursy');
});

$router->get('/diagram', function() use ($app) {
	$app->getPage('diagram');
});

$router->dispatch();
