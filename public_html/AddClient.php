<?php
/**
 * Create a new client
 */ 

class AddClient{
	private string $firstname;
	private string $lastname;
	private string $phone;
	function __construct($firstname, $lastname, $phone){
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->phone = $phone;
	}

	function add(){
		// Load the DB connection
		include_once("connection.php");
		// Insert into db
		return mysqli_query($mysqli, "INSERT INTO clients (`firstname`, `lastname`, `numberphone`) VALUES ('".$this->firstname."', '".$this->lastname."', '".$this->phone."')");
	}
}

if(!empty($_POST)){
	$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$firstname = isset($_POST['firstname']) && !empty($_POST['firstname']) ? $_POST['firstname'] : false;
	$lastname = isset($_POST['lastname']) && !empty($_POST['lastname']) ? $_POST['lastname'] :  false;
	$phone = isset($_POST['phone']) && !empty($_POST['phone']) ? $_POST['phone'] : false;

	if($firstname && $lastname && $phone){
		// Add into DB
		$newClient = new AddClient($firstname, $lastname, $phone);
		if($newClient->add()){
			echo "1";
		}else{
			echo "0";
		}
	}else{
		echo "2";
	}
}else{
	echo "2";
}