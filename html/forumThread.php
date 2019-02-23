<?php
session_start();
include ('../db_connection.php');
$connect = new db_connection();
$threds = $connect->getAllForumThread();

$inputUsername="";
$inputPassword="";

if(isset($_POST['forumThread'])){
	for($i = 0; $i < count($threds); $i++){
		if($i == $_POST['forumThread']){
			echo var_dump($threds[$i]->getGameID());
			//$_SESSION['forum'] = $threds[$i]->getAllForumPost();
			echo true;
		}	
	}
}
else{
		echo false;
}
?>