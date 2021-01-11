<?php

declare(strict_types=1);

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

	public function getCurrency(): array
	{
		return (new ApiController())->getCurrency();
	}

	public function getHistoryCurrency(): array
	{
		return (new ApiController())->getHistoryCurrency();
	}
}
