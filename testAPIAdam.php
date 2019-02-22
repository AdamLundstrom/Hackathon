<?php
//ini_set('max_execution_time', 3600);
$xml=simplexml_load_file("Provresultat.xml");
//include('httpful.phar');
$array=$xml->R;
$oldPlace="?";
$weatherTemp = "";
$i=1;
include('httpful.phar');

$response = \Httpful\Request::post($uri)	
    ->sendsXml()
    ->send();

$url = "http://opendata-download-metfcst.smhi.se/api/category/pmp2g/version/2/geotype/point/lon/$lng/lat/$lat/data.json";
$response = \Httpful\Request::get($url)
->send();
$rows = json_decode($response, true);
$timeNow=date("Y-m-d h:a",time());
$rowsUsed = $rows['timeSeries'];
if(count((array) $rowsUsed)!=0){		
	foreach($rowsUsed as $time){				
		$bT=strtotime($time['validTime']);
		$t=date("Y-m-d h:a",strtotime("-2 hours",$bT));
		if($t==$timeNow){
			$rowsUsed=$time['parameters'];
			foreach($rowsUsed as $weather){
				if($weather['name']=='t'){
					$weatherTemp=$weather['values'][0];
				}
				


?>					
