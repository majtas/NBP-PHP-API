<?php

namespace App\Classes;

class Currency {
	private static $values = ['eur', 'chf', 'usd', 'gold'];

	public static function getValues() {
		static::validValues();
		return static::$values;
	}

	public static function validValues() {
		if(empty(static::$values)) throw new \Exception('Uzupełnij tablicę walut!');
	}
}
