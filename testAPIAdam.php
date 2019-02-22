<?php

include('httpful.phar');
//ranking
//$uri =  "https://api.appmonsta.com/v1/stores/android/rankings/aggregate	.json?country=US&date=2019-02-21";
$uri =  "https://api.appmonsta.com/v1/stores/android/rankings.json?country=US&date=2019-02-21";
$user = "ba1a9efaa156d10ee4034bc8e4d7ff145649578a";
//56f354edcfd878161746a0acf083049556550680
$password = "X";
//$response = "";
$response = \Httpful\Request::get($uri)	
    ->authenticateWith($user, $password)
    ->send();
$response = ($response->body);
//echo var_dump($response);
$arrayOfId = explode("\n", $response);
//print_r ($arrayOfId);
//$response = null;

//echo $response
//echo json_encode($response,true);
//$array = json_decode($arrayOfId,true);
$i2 = 3;
//cho (var_dump(json_decode($arrayOfId[1],true)));
//echo json_decode($response,true);


for($i = 0; $i < 9; $i++){
	
		
	$arrayOfId[$i] = json_decode($arrayOfId[$i],true);
	echo $arrayOfId[$i]["app_name"]."<br>";
	
	
	
}

	
?>					
