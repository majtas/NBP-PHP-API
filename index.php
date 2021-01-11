<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use App\Classes\Currency;
use GuzzleHttp\Exception\ClientException;

try {
	Currency::validValues();
	require_once("web.php");
}
catch (ClientException $e) {
	exit("Currency ". $e->getResponse()->getReasonPhrase());
}
catch (Exception $e) {
	exit($e->getMessage());
}
catch (Throwable $e) {
	exit("Wystąpił nieoczekiwany błąd. Skontaktuj się z administratorem. Kod błędu: {$e->getCode()}");
}
