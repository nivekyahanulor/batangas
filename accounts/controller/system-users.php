<?php
include('../controller/database.php');


$users = $mysqli->query("SELECT * from ub_users");


if(isset($_POST['adduser'])){
	
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];

	$result = $mysqli->query("INSERT INTO ub_users (firstname , lastname , username, password ) VALUES ('$fname','$lname','$username','$password')");
		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " User is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
}

if(isset($_POST['delete-user'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  ub_users where user_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " User is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	
}

if(isset($_POST['update-user'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$username       = $_POST['username'];


	$result = $mysqli->query("UPDATE ub_users set 
										 firstname  ='$fname' ,
										 username  ='$username' ,
										 lastname  ='$lname' 
										 WHERE user_id = '$id' 
					");

	if($result){
		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "User Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	}else{
		echo '  <script>
					Swal.fire({
							title: "Error! ",
							text: "Something Wrong!",
							icon: "error",
							type: "error"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	}
		
	
}
	




