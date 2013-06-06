<?php

namespace Sozial\Controller;

class Abstrakt {
	
	private $app;
	private $router;
	private $route;

	public function __construct()
	{
		global $app;

		$this->router = $app->router();
		$this->route = $app->router()->getCurrentRoute();
		$this->app = $app;
	}

	public function getRouter()
	{
		return $this->router;
	}

	public function getRoute()
	{
		return $this->route;
	}

	public function getApp()
	{
		return $this->app;
	}

}