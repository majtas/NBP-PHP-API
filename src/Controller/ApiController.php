<?php

declare(strict_types=1);

namespace App\Controller;

use App\Classes\Currency;
use Exception;
use GuzzleHttp;

class ApiController {
	private $client;
	private $format;
	private $currencyRequest;
	private $attributes = [];

	public function __construct(string $format = 'json')
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
		$this->setCurrencyRequest();
	}

	public function getCurrency(): array
	{
		$this->attributes['request'] =
			$this->getCurrencyRequest() === 'gold' ?
				$this->request('GET', "cenyzlota") :
				$this->request('GET', "exchangerates/rates/C/{$this->getCurrencyRequest()}/");
		return $this->attributes;
	}

	public function getHistoryCurrency(): array
	{
		$startDate = date('Y-m-d');
		$endDate = date('Y-m-d', strtotime("-2 months"));
		$this->attributes['request'] = $this->request('GET', "exchangerates/rates/C/{$this->getCurrencyRequest()}/{$endDate}/{$startDate}");
		$this->attributes['diagram'] = $this->getJsonDiagramConfig();
		unset($this->attributes['request']);
		return $this->attributes;
	}

	public function getJsonDiagramConfig(): string
	{
		foreach($this->attributes['request']->rates as $rate) {
			$this->attributes['diagram'][] =
				[
					'date' => date('d F', strtotime($rate->effectiveDate)),
					'ask' => $rate->ask,
					'bid' => $rate->bid
				];
		}
			return json_encode($this->attributes['diagram']);
	}

	private function request(string $method, string $uri): object
	{
		$this->validate($method, $uri);
		$result = $this->client->request($method, $uri);
		if($result->getStatusCode() == 200) {
			return json_decode($result->getBody()->getContents());
		}
	}

	private function setCurrencyRequest()
	{
		$request = $_REQUEST['searching'];
		if(!in_array($request, Currency::getValues())) throw new Exception("Nie możemy odnaleźć szukanej waluty.");
		else $this->currencyRequest = $request;
	}

	private function getCurrencyRequest(): string {
		return $this->currencyRequest;
	}

	private function validate(string $method, string $uri) {
		if(empty($method) || empty($uri)) exit("Błąd pobierania danych. Puste parametry.");
	}
}
