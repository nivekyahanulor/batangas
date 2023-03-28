<?php
include('../controller/database.php');


$ub_students = $mysqli->query("SELECT a.* from ub_students a ");

if(isset($_POST['add-student'])){
	
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$contactnumber  = $_POST['contactnumber'];
	$email          = $_POST['email'];
	$idnumber       = $_POST['idnumber'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/student/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO ub_students (firstname , lastname ,contact,id_number,email,photo) 
			VALUES ('$fname','$lname','$contactnumber','$idnumber','$email','$location')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Student Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "student.php";
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


if(isset($_POST['delete-student'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  ub_students where student_id  ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Student is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "student.php";
							});
			</script>';
	
}

if(isset($_POST['update-student'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$contactnumber  = $_POST['contactnumber'];
	$email          = $_POST['email'];
	$idnumber       = $_POST['idnumber'];
	
	$letter  	    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/student/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"assets/student/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}
	
	
	$mysqli->query("UPDATE  ub_students set firstname  ='$fname' ,
										    lastname  ='$lname' ,
										    email  ='$email' ,
										    id_number  ='$idnumber' ,
										    photo  ='$location' ,
										    contact  ='$contactnumber' 
										    WHERE student_id  ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Student Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "student.php";
							});
			</script>';
	
}