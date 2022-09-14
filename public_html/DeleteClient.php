<?php
/**
 * Remove a client from DB
 */ 

class DeleteClient{
	private int $id;
	function __construct($id){
		$this->id = $id;
	}

	function delete(){
		// Load the DB connection
		include_once("connection.php");
		// Update client
		return mysqli_query($mysqli, 'DELETE FROM clients where id = '.$this->id);
	}
}

if(!empty($_POST)){
	$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : false;

	if($id){
		// Delete client from DB
		$Client = new DeleteClient($id);
		if($Client->delete()){
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