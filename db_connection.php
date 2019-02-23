<?php
include 'Objects.php';
class db_connection{
	//konstruktorn som skapar en array med alla användare och turer 
	function __construct(){
		//databaskopplingens uppgifter
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = ""; 
		$this->db="hackathon";

		//försöker ansluta till databasen
		$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db);
		//Om det inte går att ansluta till databasen
		if($this->connection->connect_error){ 
			//Anslut till servern
			$this->connection = new mysqli($this->servername, $this->username, $this->password);

			if ($this->connection->connect_error) {
				die("Connection failed: " . $this->connection->connect_error);
			} 
			//skapa en ny databas
			$sql = "CREATE DATABASE IF NOT EXISTS hackathon";
			
			if ($this->connection->query($sql) === FALSE) {
				echo "Error creating database: " . $this->connection->error;
			}
			$this->connection->close();
			//öppna flödet till  den nya databasen
			$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db) or die("not woking");
		}

		//om tabellen inte existerar skapas en ny
		$sql = "CREATE TABLE IF NOT EXISTS User(
			userID int AUTO_INCREMENT PRIMARY KEY,
			userName varchar(30) NOT NULL,
			userPassword varchar(30) NOT NULL,
			email varchar(30) NOT NULL,
			UNIQUE (userName)
			)";	
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 1	" , $this->connection->error, "<br>";
		} 

		$sql = "CREATE TABLE IF NOT EXISTS ForumThread(
			gameID DOUBLE PRIMARY KEY,
			threadName varchar(250) NOT NULL,
			UNIQUE (gameID),
			UNIQUE (threadName)
			)";	

		if ($this->connection->query($sql) === FALSE) { 
				echo "Error creating table: 2	" , $this->connection->error, "<br>";
		} 

		
		$sql = "CREATE TABLE IF NOT EXISTS ForumPost(
			forumPostID int AUTO_INCREMENT PRIMARY KEY,
			gameID double NOT NULL,
			FOREIGN KEY (gameID) REFERENCES ForumThread(gameID),
			userID int NOT NULL,
			FOREIGN KEY (userID) REFERENCES User(userID),
			posted DATE NOT NULL,
			title varchar(50) NOT NULL,
			postText varchar(250) NOT NULL	
			)";
		
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 3	" , $this->connection->error, "<br>";
		}

		$sql = "CREATE TABLE IF NOT EXISTS App(
			id int AUTO_INCREMENT PRIMARY KEY,
			appID varchar(250),
			appName varchar(250) NOT NULL,
			UNIQUE (appID),
			UNIQUE (appName)
			)";
		
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 4	" , $this->connection->error, "<br>";
		}
		
	}	
	
	function dropDatabase(){
		$sql = "DROP DATABASE hackathon";
		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function addUser($newUserName, $newUserPW, $email){
		$sql = "INSERT INTO User (userName, userPassword, email)
		Values ('$newUserName', '$newUserPW', '$email')";

		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	
	function getUser($username){
		$sql="SELECT * FROM User WHERE userName='$username'";
		$result=$this->connection->query($sql);
		if($result->num_rows > 0){	
			$row=$result->fetch_assoc();
			$user = new User($row["userID"],$row['userName'],$row["userPassword"], $row["email"]);
			return $user;	
		}
	}

	function addForumPost($gameID, $userID, $title, $postText){
		$posted = date("Y-m-d");
		$sql = "INSERT INTO ForumPost (gameID, userID, posted, title, postText)
		Values ('$gameID', '$userID', '$posted', '$title', '$postText')";

		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function getAllForumPost(){
		$sql="SELECT * FROM ForumPost";
		$result=$this->connection->query($sql);
		$postList = null;
		//var_dump($result);
		
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
	
				$postList[] = new Post($row["forumPostID"], $row['gameID'], $row['userID'],$row["posted"],$row["title"],$row["postText"]);
			}		
			//var_dump($postList);
		}
		return $postList;
	}

	function getPostsByThread($gameid){
		$sql="SELECT postText FROM ForumPost WHERE gameID='$gameid'";
		$result=$this->connection->query($sql);
		$postList = null;
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
				$postList[] = $row["postText"];
			}	
		}
		return $postList;		
	}
	
	function getPostsByThread2($gameid){
		$sql="SELECT title FROM ForumPost WHERE gameID='$gameid'";
		$result=$this->connection->query($sql);
		$postList = null;
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
				$postList[] = $row["title"];
			}	
		}
		return $postList;		
	}

	function addForumThread($gameID, $threadName){
		$sql = "INSERT INTO ForumThread (gameID, threadName)
		Values ('$gameID', '$threadName')";

		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function getAllForumThread(){
		$sql="SELECT * FROM ForumThread";
		$result=$this->connection->query($sql);
		$threadList = null;
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
				$threadList[] = new Thread($row["gameID"], $row['threadName']);
			}	
		}
		return $threadList;
	}

	function addApp($appID, $appName){
		$sql = "INSERT INTO App (appID, appName)
		Values ('$appID', '$appName')";

		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function getAllApps(){
		$sql="SELECT * FROM App";
		$result=$this->connection->query($sql);
		$appList = array();
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
				$appList[] = new App($row["appID"], $row['appName'], $row["id"]);
			}	
		}
		return $appList;
	}

	function getAppByName($appName){
		$sql = "SELECT appID FROM App WHERE appName ='$appName'";
		$result=$this->connection->query($sql);
		$appList ="";
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
				$appList[] = $row["appID"];
			}	
		}
		return $appList;

	}

	function getAllAppNames(){
		$sql="SELECT appName FROM App LIMIT 0, 10";
		$result=$this->connection->query($sql);
		$appList = array();
		if($result->num_rows > 0){	
			while($row=$result->fetch_assoc()){	
				$appList[] = $row['appName'];
			}	
		}
		return $appList;
	}

}

$db = new db_connection;

#$db->dropDatabase();
/*
$db->addUser("Alice", "AAAAA", "email@email");
$db->addUser("Bob", "BBBBB", "email@email");
$db->addUser("Code", "CCCCC", "email@email");


$db->addForumThread(44, "DOOOOOM");
$db->addForumThread(2, "Tetris");


$db->addForumPost(44, 1, "Title1", "Textttttttttttttttt");
$db->addForumPost(44, 1, "Title2", "Text");
$db->addForumPost(44, 2, "Title3", "Text");
$db->addForumPost(44, 2, "Title4", "Textttttttttttttttt");
*/

#$user = $db->getUser("Bob");
#echo $user->getUserName();

#$posts = $db->getAllForumPost();
#echo count($posts);

#$threads = $db->getAllForumThread();
#echo count($threads);

#$posts['']->getPostText();


#var_dump($db->getPostsByThread(44));
#var_dump($db->getPostsByThread2(44));

?>