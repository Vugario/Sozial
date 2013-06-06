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

		// Configuration
		$this->config = json_decode( file_get_contents( APP_DIR . 'config/config.json' ) );

		// Database
		$m = new \MongoClient( 'mongodb://' . $this->config->database->host, (array)$this->config->database->options );
		$this->db = $m->{$this->config->database->database};
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