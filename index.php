<?php

require_once("vendor/autoload.php");

use App\Classes\Currency;
use GuzzleHttp\Exception\ClientException;

try {
	Currency::validValues();
	require_once("web.php");
}
catch (ClientException $e) {
	print_r("Currency ". $e->getResponse()->getReasonPhrase());
}
catch (Exception $e) {
	print_r($e->getMessage());
}
catch (Throwable $e) {
	print_r("Wystąpił błąd. Kod błędu: {$e->getCode()}");
}
