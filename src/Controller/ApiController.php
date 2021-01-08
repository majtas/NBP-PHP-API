<?php

namespace App\Controller;

use App\Classes\Currency;
use Exception;
use GuzzleHttp;

class ApiController {

	private $client;
	private $format;
	private $formRequest;
	private $attributes = [];

	public function __construct($format = 'json')
	{
		$this->client = new GuzzleHttp\Client(
			['base_uri' => 'http://api.nbp.pl/api/'],
			['headers' =>
				[
					'Accept' => 'application/json'
				],
			]
		);
		$this->format = $format;
		$this->attributes['values'] = Currency::getValues();
		$this->setFormRequest();
	}

	public function getCurrency()
	{
		$this->attributes['request'] =
			$this->getFormRequest() === 'gold' ?
				$this->request('GET', "cenyzlota") :
				$this->request('GET', "exchangerates/rates/C/{$this->getFormRequest()}/");
		return $this->attributes;
	}

	private function request($method, $uri)
	{
		$this->validate($method, $uri);
		$result = $this->client->request($method, $uri);
		if($result->getStatusCode() == 200) {
			return json_decode($result->getBody());
		}
	}

	private function setFormRequest()
	{
		$request = $_REQUEST['searching'];
		if(!in_array($request, Currency::getValues())) throw new Exception("Nie możemy odnaleźć szukanej waluty.");
		else $this->formRequest = $request;
	}

	private function getFormRequest() {
		return $this->formRequest;
	}

	private function validate($method, $uri) {
		if(empty($method) || empty($uri)) exit("Błąd pobierania danych. Puste parametry.");
	}
}
