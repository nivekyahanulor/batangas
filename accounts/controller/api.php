<?php
include('../controller/database.php');
error_reporting(0);


if(isset($_POST['validateuser'])){
	$username = $_POST['username'];
	$users = $mysqli->query("SELECT * from ub_users WHERE username = '$username'");
	echo json_encode($users->num_rows);
}

if(isset($_POST['adduser'])){
	
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];

	$result = $mysqli->query("INSERT INTO ub_users (firstname , lastname , username, password ) VALUES ('$fname','$lname','$username','$password')");
	echo json_encode($result);
}
