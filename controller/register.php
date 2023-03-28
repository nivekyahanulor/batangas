<?php
	include('database.php');

	if(isset($_POST['register'])){
		
		$firstname    = $_POST['firstname'];
		$lastname     = $_POST['lastname'];
		$email        = $_POST['email'];
		$contact 	  = $_POST['contact'];
		$password     = $_POST['password'];
		$studentid     = $_POST['studentid'];
		$name         = $firstname .' '.$lastname;
		$check        = $mysqli->query("SELECT * from ub_students where id_number='$studentid'");
		$count        = $check->num_rows;
		
		if($count !=0){
			echo "<script> window.location.href='../register.php?duplicate'; </script>";
		} else {
			
		$mysqli->query("INSERT INTO ub_students (firstname,lastname,email,contact,password,id_number) 
								VALUES ('$firstname','$lastname','$email','$contact','$password','$studentid')");
		echo "<script> window.location.href='../index.php?registered'; </script>";
		
	}
	}
