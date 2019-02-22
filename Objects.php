<?php

class Person{
	//konstruerar en användare 
	private $personID;
	private $password;
	private $firstName;
	private $lastName;
	private $phoneNr;
	private $longitude;
	private $latitude;
	function __construct($personID, $password, $firstName, $lastName, $phoneNr,$lat,$lng, $interest){
		
		$this->personID= $personID;
		$this->password= $password;
		$this->firstName= $firstName;
		$this->lastName= $lastName;
		$this->longitude = $lng;
		$this->latitude = $lat;	
		$this->interest= $interest;	
		$this->phoneNr= $phoneNr;
	}
	//hämtar uppgifter om användaren
	function getPersonID(){
		return $this->personID;
	}
	function getPassword(){
		return $this->password;
	}	
	function setFirstName($firstName){
		$this->firstName= $firstName;
	}
	function getFirstName(){
		return $this->firstName;
	}	
	function setLastName($lastName){
		$this->lastName= $lastName;
	}
	function getLastName(){
		return $this->lastName;
	}
	function getLatitude(){
		return $this->latitude;
	}
	function getLongitude(){
		return $this->longitude;
	}
	function setInterest($interest){
		$this->interest=$interest;
	}
	function getInterest(){
		return $this->interest;
	}	
	function setPhoneNr($phoneNr){
	$this->phoneNr=$phoneNr;
	}
	function getPhoneNr(){
		return $this->phoneNr;
	}
	function __toString(){
		return $this->firstName." ".$this->lastName." ".$this->phoneNr; 
	}
}
class Event{
	private $eventID;
	private $title;
	private $longitude;
	private $latitude;
	private $description;
	private $datee;	
	private $timee;		
	//konstruerar ett objekt med turer
	function __construct($eventID, $title,$description,$lat,$lng,$datee,$timee){
		$this->eventID= $eventID;
		$this->title= $title;
		$this->longitude = $lng;
		$this->latitude = $lat;	
		$this->description= $description;
		$this->datee= $datee;	
		$this->timee= $timee;		
	}
	//hämtar uppgifter om användaren
	function getEventID(){
		return $this->eventID;
	}
	function getLatitude(){
		return $this->latitude;
	}
	function getLongitude(){
		return $this->longitude;
	}
	
	function setTitle($title){
		$this->title= $title;
	}
	function getTitle(){
		return $this->title;
	}	
	function setAddress($address){
		$this->address= $address;
	}
	function getAddress(){
		return $this->address;
	}
	function setDescription($description){
		$this->description= $description;
	}
	function getDescription(){
		return $this->description;
	}
	function setDatee($datee){
		$this->datee=$datee;
	}
	function getDatee(){
		return $this->datee;
	}	
	function setTimee($timee){
		$this->timee=$timee;
	}
	function getTimee(){
		return $this->timee;
	}
}
?>