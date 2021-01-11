<?php

namespace App\Controller;

use App\Classes\Currency;
use App\View;

class AppController {
	private View $view;

	public function __construct() {
		$this->view = new View();
	}

	public function getPage($page, $params = []) {
		$file = "./templates/pages/$page.php";
		$params['values'] = Currency::getValues();
		file_exists($file) ? $this->view->view($file, $params) : $this->view->view(404);
	}

	public function getCurrency()
	{
		return (new ApiController())->getCurrency();
	}

	public function getHistoryCurrency()
	{
		return (new ApiController())->getHistoryCurrency();
	}
}
