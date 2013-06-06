<?php

namespace Sozial\Controller;

use Sozial\Controller\Abstrakt;


class Index extends Abstrakt {
	
	public function index()
	{
		return array( "results" => array() );
	}

}