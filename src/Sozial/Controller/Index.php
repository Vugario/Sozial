<?php

namespace Sozial\Controller;

use Sozial\Controller\Abstrakt;


class Index extends Abstrakt {
	
	public function index()
	{
		$items = iterator_to_array( $this->db->post->find()->limit( 30 ) );

		return array( "results" => $items );
	}

}