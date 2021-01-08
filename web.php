<?php

use App\Controller\AppController;
use App\Controller\ApiController;
use App\Route\Route;

$app = new AppController();
$router = new Route();

$router->get('/', function() use ($app) {
	$app->getPage('home');
});

$router->get('/kurs', function() use ($app) {
	$app->getPage('kursy', ['values' => $app->getCurrencyArray()]);
});
$router->post('/kurs', function() use ($app) {
	$app->getPage('kursy', (new ApiController())->getCurrency());
});

$router->get('/diagram', function() use ($app) {
	$app->getPage('diagram');
});

$router->dispatch();
