<?php
// Point to where you downloaded the phar
include('./httpful.phar');
include('db_connection.php');

$uri =  "https://api-v3.igdb.com/games";
$key = '25adf5f6b515bd32214172f04eaeeb67';


$db = new db_connection;

#$db -> dropDatabase();

$array = ReadMostPopular($uri, $key, $db);

#var_dump($array);

function ReadMostPopular($uri, $key, $db){
	$response = \Httpful\Request::post($uri) 
	->addHeader('user-key', $key)
	->body('limit 10; fields name; popularity; sort popularity desc;')
	->send();

	$json = json_decode($response, true);

	$nameArray = array();
	foreach($json as $name){
		$nameArray[] = $name["name"];
		/*if($name["id"] == "90099"){
			$db -> addForumThread($name["id"], "Tom Clancy''s The Division 2");
		} else{
			$db->addForumThread($name["id"], $name["name"]);
		}*/
		echo $name["id"];
		echo $name["name"];
		echo "<br/>";
	}

	return $nameArray;
	#return $response;
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



