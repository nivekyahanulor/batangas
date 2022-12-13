<?php

	ob_start();
	session_start();
	include('database.php');

	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	$sql      = "SELECT * FROM ub_users WHERE username='$username' AND BINARY password='$password'";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	
	if($rows==1){
		$_SESSION['name']  = $row['firstname'].' '. $row['lastname'];
		$_SESSION['id']    = $row['user_id'];
		$_SESSION['role']  = 1;
		header("location:../accounts/index.php");
	} else { 
		$sql1      = "SELECT * FROM ub_teacher WHERE id_number='$username' AND BINARY password='$password'";
		$result1   = mysqli_query($mysqli, $sql1);

		$row1      = mysqli_fetch_assoc($result1);
		$rows1	   = mysqli_num_rows($result1);
		if($rows1==1){
			
			$_SESSION['name']  = $row1['firstname'].' '. $row1['lastname'];
			$_SESSION['id']    = $row1['teacher_id'];
		    $_SESSION['role']  = 2;
			
		header("location:../accounts/student.php");
		} else {
			header("location:../login.php?error");
		}
	}
