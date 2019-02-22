<?php
// Point to where you downloaded the phar
include('./httpful.phar');

$uri =  "https://api-v3.igdb.com/games";

$key = '25adf5f6b515bd32214172f04eaeeb67';

$response = \Httpful\Request::post($uri) 
	->addHeader('user-key', $key)
	->body('limit 1; fields name ; search "tetris";')
	->send();

echo $response;

?>