<?php

declare(strict_types=1);

namespace App\Classes;

class Currency {
	private static $values = ['jpy', 'eur', 'chf', 'usd', 'gold'];

	public static function getValues(): array {
		static::validValues();
		return static::$values;
	}

	public static function addValue(array $values) {
		foreach($values as $value) {
			static::$values[] = $value;
		}
	}

	public static function validValues() {
		if(empty(static::$values)) throw new \Exception('Uzupełnij tablicę walut!');
	}

	private function __construct(){}
}
