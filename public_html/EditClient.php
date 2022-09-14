<?php
/**
 * Update the client details
 */ 

class EditClient{
	private string $firstname;
	private string $lastname;
	private string $phone;
	private int $id;
	function __construct($firstname, $lastname, $phone, $id){
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->phone = $phone;
		$this->id = $id;
	}

	function update(){
		// Load the DB connection
		include_once("connection.php");
		// Update client
		return mysqli_query($mysqli, 'UPDATE clients SET firstname ="'.$this->firstname.'", lastname = "'.$this->lastname.'", numberphone = "'.$this->phone.'", updated_at="'.date("Y-m-d H:i:s").'" where id = '.$this->id);
	}
}

if(!empty($_POST)){
	$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$firstname = isset($_POST['firstname']) && !empty($_POST['firstname']) ? $_POST['firstname'] : false;
	$lastname = isset($_POST['lastname']) && !empty($_POST['lastname']) ? $_POST['lastname'] :  false;
	$phone = isset($_POST['phone']) && !empty($_POST['phone']) ? $_POST['phone'] : false;
	$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : false;

	if($firstname && $lastname && $phone && $id){
		// Update client
		$Client = new EditClient($firstname, $lastname, $phone, $id);
		if($Client->update()){
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