<?php

include('httpful.phar');
include ('db_connection.php');
$connect = new db_connection();
#$connect->dropDatabase();
#$connect = new db_connection();
//ranking
//$uri =  "https://api.appmonsta.com/v1/stores/android/rankings/aggregate	.json?country=US&date=2019-02-21";
$uri1 =  "https://api.appmonsta.com/v1/stores/android/rankings.json?country=US&date=2019-02-21";
$user1 = "ba1a9efaa156d10ee4034bc8e4d7ff145649578a";
//56f354edcfd878161746a0acf083049556550680
$password = "X";
//$response = "";
$response = \Httpful\Request::get($uri1)	
    ->authenticateWith($user1, $password)
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


for($i = 0; $i < 19; $i++){
	
		
	$arrayOfId[$i] = json_decode($arrayOfId[$i],true);
	#$connect->addApp($arrayOfId[$i]["app_id"],$arrayOfId[$i]["app_name"]); 	
	//echo $arrayOfId[$i]["app_id"]."<br>";
}

echo GetAppInfo($uri1, $user1, "Clock");



function GetAppInfo($user1, $keyWord){
	$connect = new db_connection();
	$keyID = $connect -> getAppByName($keyWord);
	#var_dump($keyID);
	$uriApp = "https://api.appmonsta.com/v1/stores/android/details/com.google.android.deskclock.json?country=US";
	$response = \Httpful\Request::get($uriApp)	
    ->authenticateWith($user1, "X")
    ->send();
	$response = ($response->body);
	var_dump($response);

	$arrayOfId = explode("\n", $response);

	return $arrayOfId["description"];


		#$connect->addApp($arrayOfId[$i]["app_id"],$arrayOfId[$i]["app_name"]); 	
		//echo $arrayOfId[$i]["app_id"]."<br>";	

}
	
?>					
