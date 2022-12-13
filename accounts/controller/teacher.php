<?php
include('../controller/database.php');


$teacher = $mysqli->query("SELECT a.* from ub_teacher a ");

if(isset($_POST['add-teacher'])){
	
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$address        = $_POST['address'];
	$contactnumber  = $_POST['contactnumber'];
	$email          = $_POST['email'];
	$idnumber       = $_POST['idnumber'];
	$password       = $_POST['password'];

	$mysqli->query("INSERT INTO ub_teacher (firstname , lastname ,address,contact,id_number,password,email ) 
			VALUES ('$fname','$lname','$address','$contactnumber','$idnumber','$password','$email')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Teacher Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "teacher.php";
							});
			</script>';
	
}

if(isset($_POST['delete-teacher'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  ub_teacher where teacher_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Teacher is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "teacher.php";
							});
			</script>';
	
}

if(isset($_POST['update-teacher'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$address        = $_POST['address'];
	$contactnumber  = $_POST['contactnumber'];
	$email          = $_POST['email'];
	$idnumber       = $_POST['idnumber'];
	$password       = $_POST['password'];
	
	$mysqli->query("UPDATE  ub_teacher set firstname  ='$fname' ,
										 lastname  ='$lname' ,
										 address  ='$address' ,
										 email  ='$email' ,
										 id_number  ='$idnumber' ,
										 contact  ='$contactnumber' ,
										 password  ='$password' 
										 WHERE teacher_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Teacher Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "teacher.php";
							});
			</script>';
	
}