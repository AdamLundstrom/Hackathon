<?php
// Point to where you downloaded the phar
include('./httpful.phar');

$uri =  "https://api-v3.igdb.com";
$username = 'WictorSvensson';
$password = 'Wictor123';

$response = \Httpful\Request::post($uri+"/games"); // Build a POST request...
->sendsJson();                               // tell it we're sending (Content-Type) JSON...
->authenticateWith($username, $password);  // authenticate with basic auth.
->send();

echo "Games: $response->title"

?>