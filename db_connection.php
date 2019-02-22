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
	//$this->connection = new mysqli($this->servername, $this->username, $this->password);
	//	$sql = "CREATE DATABASE hackathon";
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
		
		$sql= "CREATE TABLE IF NOT EXISTS Person(
		personID varchar(12) PRIMARY KEY,
		password varchar(20) NOT NULL,
		firstName varchar(50) NOT NULL,
		lastName varchar(50) NOT NULL,
		phone varchar(11),
		latitude float(20) NOT NULL,
		longitud float(20) NOT NULL,
		interest varchar(50) NOT NULL
		)";	
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 1	" , $this->connection->error, "<br>";
		} 
		$sql= "CREATE TABLE IF NOT EXISTS Event(
		eventID int(3) AUTO_INCREMENT PRIMARY KEY,
		title varchar(50) NOT NULL,
		description varchar(50) NOT NULL,
		latitude float(20) NOT NULL,		
		longitud float(20) NOT NULL,
		date varchar(20) NOT NULL,
		time varchar(20) NOT NULL
		)";
		
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 2	" , $this->connection->error, "<br>";
		} 
		$sql= "CREATE TABLE IF NOT EXISTS participate(
		eventID int(3),
		personID varchar(12),
		FOREIGN KEY (personID) REFERENCES Person(personID),
		FOREIGN KEY (eventID) REFERENCES Event(eventID),
		PRIMARY KEY (personID,eventID)
		)";
		
		if ($this->connection->query($sql) === FALSE) { 
			echo "Error creating table: 3	" , $this->connection->error, "<br>";
		}
		//hämtar all data från tabellen användare och lägger dem i en array
		$sql="SELECT * FROM Person";
		$result=$this->connection->query($sql);
		if($result->num_rows > 0){		
			while($row=$result->fetch_assoc()){
			$this->personList[]=new Person($row["personID"],$row['password'],$row["firstName"],$row["lastName"],$row["phone"],$row["latitude"],
				$row["longitud"], $row["interest"]);
			}		
		}
		//hämtar all data från tabellen bokningar och lägger dem i en array	
		$sql="SELECT * FROM Event";
		$result=$this->connection->query($sql);
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
					$this->eventList[]=new Event($row["eventID"],$row["title"],$row["description"],
					$row["latitude"],$row["longitud"],$row["date"],$row["time"]);
				
			}		
		}	
	}		
	function addEvent($pNo,$t,$d,$lat,$lng,$date,$time){
		$sql = "INSERT INTO Event (title,description,latitude,longitud,date,time)
		VALUES ('$t','$d','$lat','$lng','$date',$time)";
		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		$ID=0;
		$sql = "SELECT eventID FROM Event ORDER BY eventID DESC LIMIT 1";
		$result=$this->connection->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$ID = $row['eventID'];
		}
		$this->eventList[]=new Event($ID,$t,$d,$lng,$lat,$date,$time);
		$sql = "INSERT INTO participate (eventID, personID)
		VALUES ('$ID','$pNo')";
		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}		
		$this->connection->close();			
	}		
	function addPerson($pN,$password,$f,$l,$p,$lat,$lng,$i){
		$this->personList[]=new Person($pN,$password,$f,$l,$p,$lat,$lng,$i);
		$sql = "INSERT INTO Person (personID,password,firstName,lastName,phone,latitude,longitud,interest)
		VALUES ('$pN','$password','$f','$l','$p','$lat','$lng','$i')";
		if ($this->connection->query($sql) === False) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		$this->connection->close();
	}
	function addPersonToEvent($e,$p){
		$sql = "INSERT INTO participate (eventID, personalID) VALUES ('$e','$p')";
		if ($this->connection->query($sql) === false) {
			echo "Error: " . $sql . "<br>" . $this->connection->error;
		}
		$this->connection->close();
	}	
	function getPersonsFromEvent($e){
		$ID = (int)$e;
		$persons = array();
		$sql="SELECT personID FROM participate WHERE eventID = $ID";
		$result=$this->connection->query($sql);
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				$persons = $row['personID'];
			}
		}	
		return $persons;
	}
	function getPerson($id){
		return $this->personList[$id];
	}
	function getPersonPNo($pNo){
		
		for($i=0;$i<count($this->personList);$i++){
			if($this->personList[$i]->getPersonID() == $pNo){
				return $this->personList[$i];
			}
		}	
	}		
	function getEvent($id){
		return $this->eventList[$id];
	}		
	function getLengthOfPersonList(){
		$i =count($this->personList);
		return $i;
	}
	function getLengthOfEventList(){
		$i =count($this->eventList);
		return $i;
	}	
}

?>