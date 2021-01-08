<?php

namespace App;

class View {

	private $path = "./templates/";
	private $template = "template.php";

	private function getTemplate() {
		return $this->path.$this->template;
	}

	private function get404Page() {
		return include_once($this->path."404.php");
	}

	public function view($page, $params = []) {
		$page === 404 ? $this->get404Page() : include_once($this->getTemplate());
	}
}
