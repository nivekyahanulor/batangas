<?php
include('../controller/database.php');


$teacher = $mysqli->query("SELECT a.* from ub_section a ");

if(isset($_POST['add-section'])){
	
	$year_level  = $_POST['year_level'];
	$section     = $_POST['section'];


	$mysqli->query("INSERT INTO ub_section (year_level , section) 
			VALUES ('$year_level','$section')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Section Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "section.php";
							});
			</script>';
	
}

if(isset($_POST['delete-section'])){
	
	$id       = $_POST['section_id'];

	$mysqli->query("DELETE FROM  ub_section where section_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Section is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "section.php";
							});
			</script>';
	
}

if(isset($_POST['update-section'])){
	
	$id          = $_POST['section_id'];
	$year_level  = $_POST['year_level'];
	$section     = $_POST['section'];
	
	$mysqli->query("UPDATE  ub_section set year_level  ='$year_level' ,
										 section  ='$section' 
										 WHERE section_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Section Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "section.php";
							});
			</script>';
	
}