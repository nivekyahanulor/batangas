<?php
include('../controller/database.php');


$teacher = $mysqli->query("SELECT a.* , b.* from ub_computers a  left join ub_laboratory b on a.laboratory = b.lab_id");

if(isset($_POST['add-computer'])){
	
	$laboratory   = $_POST['laboratory'];
	$computer     = $_POST['computer'];


	$mysqli->query("INSERT INTO ub_computers (laboratory , computer) 
			VALUES ('$laboratory','$computer')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Computer Details Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "computers.php";
							});
			</script>';
	
}

if(isset($_POST['delete-computer'])){
	
	$id       = $_POST['computer_id'];

	$mysqli->query("DELETE FROM  ub_computers where computer_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Computer is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "computers.php";
							});
			</script>';
	
}

if(isset($_POST['update-computer'])){
	
	$id           = $_POST['computer_id'];
	$laboratory   = $_POST['laboratory'];
	$computer     = $_POST['computer'];


	
	$mysqli->query("UPDATE  ub_computers set laboratory  ='$laboratory' ,
										 computer  ='$computer' 
										 WHERE computer_id  ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Computer Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "computers.php";
							});
			</script>';
	
}