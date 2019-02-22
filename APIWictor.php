<?php
// Point to where you downloaded the phar
include('./httpful.phar');

$uri =  "https://api-v3.igdb.com/games";
$key = '25adf5f6b515bd32214172f04eaeeb67';


echo ReadMostPopular($uri, $key);

function ReadMostPopular($uri, $key){
	$response = \Httpful\Request::post($uri) 
	->addHeader('user-key', $key)
	->body('limit 50; fields name; popularity; sort popularity desc;')
	->send();

	return $response;
}

$searchWord = "Kingdom Hearts III";

#echo SearchGame($uri, $key, $searchWord);

function SearchGame($uri, $key, $searchWord){
	$response = \Httpful\Request::post($uri) 
	->addHeader('user-key', $key)
	->body('limit 10; fields name; search "'.$searchWord. ' ";')
	->send();

	return $response;
}

$genre = 4;

#echo CategorizeGames($uri, $key, $genre);

function CategorizeGames($uri, $key, $genre){
	$response = \Httpful\Request::post($uri) 
	->addHeader('user-key', $key)
	->body('limit 10; fields name; where genres = '.$genre. ' ;')
	->send();

	return $response;
}



?>



