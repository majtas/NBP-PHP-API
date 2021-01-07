<?php

use App\Controller\AppController;
use App\Route\Route;

require_once("vendor/autoload.php");

Route::get('asd', 'AppController@test');
// exit;

$app = new AppController();

$app->run();
