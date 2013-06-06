<?php

// Bootstrapping
$app = new \Slim\Slim();

// Routing
$routes = json_decode( file_get_contents( "../src/Sozial/config/routes.json" ) );

foreach( $routes as $item )
{
	$app->get( $item->url, function()
	{
		global $item, $app;

		// Stringify
		$controller = 'Sozial\Controller\\' . $item->controller;
		$action = $item->action;

		// Autoload + call
		$controller = new $controller();

		// Call the action
		$response = $controller->$action();

		// Headers
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		$res['X-Powered-By'] = 'Sozial (Slim)';

		if( is_array( $response ) )
		{
			$res->status( 200 );
			$res->body( json_encode( $response ) );
		}

		// When no valid response has been found
		if( !is_array( $response ) )
		{
			$res->status( 400 );
			$res->body( json_encode( array( 'status' => 'ERROR', 'message' => 'Unknown error' ) ) );
		}
	});
}

// Lets do this!
$app->run();