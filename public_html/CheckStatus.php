<?php

class CheckStatus{
	function __construct(){
	}

	function status(){
		// Load the DB connection
		include_once("connection.php");
		// Update client
		$result =  mysqli_query($mysqli, 'SELECT * FROM clients where 1 ORDER BY updated_at DESC');
		$row = $result->fetch_array();
		return ['number_rows' => $result->num_rows, "last_updated" => (!empty($row)) ? $row['updated_at'] : false];
	}
}

// Check the status
$Client = new CheckStatus();
$status = $Client->status();
echo json_encode($status);