<?php

use App\Controller\AppController;
use App\Route\Route;

$app = new AppController();
$router = new Route();

Route::get('/', function() use ($app) {
	$app->getPage('home');
});

Route::get('/kurs', function() use ($app) {
	$app->getPage('kursy');
});

Route::post('/kurs', function() use ($app) {
	$app->getPage('kursy', $app->getCurrency());
});

Route::get('/diagram', function() use ($app) {
	$app->getPage('diagram');
});

Route::post('/diagram', function() use ($app) {
	$app->getPage('diagram', $app->getHistoryCurrency());
});

Route::dispatch();
