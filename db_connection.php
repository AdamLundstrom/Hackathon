<?php
include 'Objects.php';
class db_connection{	
	private $personList=array();
	private $eventList=array();
	private $userWithBookingList=array();
	private $pNumber="";
	private $fName=""; 
	private $lName="";
	private $country="";
	private $username="";
	private $password="";		
	private $bookingDate=""; 

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
			$sql = "CREATE DATABASE hackathon";
			
			if ($this->connection->query($sql) === FALSE) {
				echo "Error creating database: " . $this->connection->error;
			}
			$this->connection->close();
			//öppna flödet till  den nya databasen
			$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db) or die("not woking");
		}

		//om tabellen inte existerar skapas en ny
		$sql= "CREATE TABLE IF NOT EXISTS User(
		userID int AUTO_INCREMENT PRIMARY KEY,
		userName varchar(30) NOT NULL,
		userPassword varchar(30) NOT NULL
		)";	
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 1	" , $this->connection->error, "<br>";
		} 

		//om tabellen inte existerar skapas en ny
		$sql= "CREATE TABLE IF NOT EXISTS ForumPost(
		forumPostID int AUTO_INCREMENT PRIMARY KEY,
		userID int NOT NULL,
		FOREIGN KEY (userID) REFERENCES User(userID),
		posted DATETIME NOT NULL,
		title varchar(50) NOT NULL,
		postText varchar(250) NOT NULL
		)";
		
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 2	" , $this->connection->error, "<br>";
			$this->dropDatabase();
		}
		
	}	
	
	function dropDatabase(){
		$sql = "DROP DATABASE hackathon";
		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function addApp(){
		$sql = "";
		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function addUser($newUserName, $newUserPW){
		$sql = "INSERT INTO User (userName, userPassword)
		Values ('$newUserName', '$newUserPW')";

		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}

	function addForumPost($userID, $title, $postText){
		$posted = date("Y-m-d H:i:s");
		$sql = "INSERT INTO ForumPost (userID, posted, title, postText)
		Values ('$userID', '$posted', '$title', '$postText')";

		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
	}	
}

$db = new db_connection;

$db->addUser("Alice", "AAAAA");
$db->addUser("Bob", "BBBBB");
$db->addForumPost(1, "Title", "Text");

#$db->dropDatabase();


?>