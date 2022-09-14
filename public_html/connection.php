<?php

include("config.php");

// Connect with DB
/* You should enable error reporting for mysqli before attempting to make a connection */
//mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = mysqli_connect(DBHost, DBUserName, DBPassword, DBName) or die("Could not connect to the DB.");
// $result = $mysqli->query("SELECT * FROM clients");

// print($result->num_rows);