<?php
session_start();
include('../controller/database.php');

$adminid  = $_SESSION['id'];
$admins    = $mysqli->query("SELECT * from ub_teacher where teacher_id ='$adminid'");


if(isset($_POST['update-profile'])){
	
	$fname      = $_POST['fname'];
	$lname      = $_POST['lname'];
	$username   = $_POST['username'];
	$password   = $_POST['password'];
	
	$letter  	    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/img/avatars/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/img/avatars/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}

	$mysqli->query("UPDATE  ub_teacher SET 
						firstname ='$fname' ,
						lastname ='$lname' ,
						password = '$password' , 
						profile='$location'
						 where teacher_id ='$adminid'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Profile Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "profile.php";
							});
			</script>';
	
}