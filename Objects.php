<?php

class User{
	//konstruerar en användare 
	private $userID;
	private $userName;
	private $userPassword;
	private $email;

	function __construct($userID, $userName, $userPassword, $email){
		$this->userID = $userID;
		$this->userName = $userName;
		$this->userPassword = $userPassword;
		$this->email = $email;
	}
	//hämtar uppgifter om användaren
	function getUserID(){
		return $this->userID;
	}
	function getuserName(){
		return $this->userName;
	}	
	function getuserPassword($userPassword){
		return $this->userPassword;
	}
	function getEmail(){
		return $this->email;
	}
	function setuserName(){
		$this->userName= $userName;
	}	
	function setuserPassword($userPassword){
		$this->userPassword= $userPassword;
	}
}

class Post{
	private $postID;
	private $userID;
	private $posted;
	private $title;
	private $postText;
	private $gameId;
	function __construct($title, $postText){
		#$this->$postID = $postID;
		#$this->$userID = $userID;
		#$this->$posted = $posted;
		$this->$title = $title;
		$this->$postText = $postText;
		#$this->$gameId = $gameId;
	}
/*	
	function getPostID(){
		return $this->postID;
	}
	function getGameID(){
		return $this->gameId;
	}		
	function getUserID(){
		return $this->userID;
	}
	function getPosted(){
		return $this->posted;
	}
	*/
	function getTitle(){
		return $this->title;
	}
	function getPostText(){
		return $this->postText;
	}

}

class Thread{
	private $gameid;
	private $threadName;

	function __construct($gameid, $threadName){
		$this->gameid = $gameid;
		$this->threadName = $threadName;
	}

	function getGameID(){
		return $this->gameid;
	}

	function getThreadName(){
		return $this->threadName;
	}
}

class App{
	Private $appID;
	Private $appName;
	Private $id;
	function __construct($appID, $appName, $id){
		$this->appID = $appID;
		$this->appName = $appName;
		$this->id = $id;

	}
	function getId(){
		return $this->id;
	}

	function getAppID(){
		return $this->appID;
	}
	function getAppName(){
		return $this->appName;
	}
}

?>