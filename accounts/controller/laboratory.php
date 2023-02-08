<?php
session_start();

include('../controller/database.php');


$ub_students      = $mysqli->query("SELECT a.* from ub_laboratory a ");
$lid              = $_GET['data'];
$ub_students_data = $mysqli->query("SELECT a.* , b.* from ub_laboratory_students a LEFT JOIN ub_students b on a.student_id = b.student_id where a.laboratory_id='$lid'");

if(isset($_POST['add-lab'])){
	
	$title          = $_POST['title'];
	$day            = $_POST['day'];
	$time  			= $_POST['time'];
	$room           = $_POST['room'];
	$id             = $_SESSION['id'];
	

	$mysqli->query("INSERT INTO ub_laboratory (lab_name , lab_date ,lab_time,lab_room,teacher_id) 
			VALUES ('$title','$day','$time','$room','$id')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Laboratory Details Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratory.php";
							});
			</script>';
	
}

if(isset($_POST['add-lab-student'])){
	
	$student     = $_POST['student'];
	$computer    = $_POST['computer'];
	$lab_date  	 = $_POST['lab_date'];
	$lab_time    = $_POST['lab_time'];
	$lab_room    = $_POST['lab_room'];
	$data        = $_POST['data'];
	
	// CHECK STUDENT //
	$ub_students_data = $mysqli->query("SELECT a.* from ub_laboratory_students a where a.student_id='$student' and laboratory_id='$data'");
	$count            = $ub_students_data->num_rows;
		
	if($count !=0){
		echo '<script> window.location = "laboratory-records.php?data='.$data.'&lab_date='.$lab_date.'&lab_time='.$lab_time.'&lab_room='.$lab_room.'&duplicate"; </script>';
	} else {
	
	
	$mysqli->query("INSERT INTO ub_laboratory_students (student_id , laboratory_id ,computer) 
			VALUES ('$student','$data','$computer')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Laboratory Student Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratory-records.php?data='.$data.'&lab_date='.$lab_date.'&lab_time='.$lab_time.'&lab_room='.$lab_room.'&added";
							});
			</script>';
	}

}

if(isset($_POST['delete-teacher'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  ub_laboratory where lab_id  ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Laboratory Details is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratory.php";
							});
			</script>';
	
}
if(isset($_POST['delete-lab-student'])){
	
	$id          = $_POST['labs_id'];
	$lab_date  	 = $_POST['lab_date'];
	$lab_time    = $_POST['lab_time'];
	$lab_room    = $_POST['lab_room'];
	$data        = $_POST['data'];
	$mysqli->query("DELETE FROM  ub_laboratory_students where labs_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratory-records.php?data='.$data.'&lab_date='.$lab_date.'&lab_time='.$lab_time.'&lab_room='.$lab_room.'&deleted";
							});
			</script>';
	
}

if(isset($_POST['update-lab'])){
	
	$id             = $_POST['id'];
	$title          = $_POST['title'];
	$day            = $_POST['day'];
	$time  			= $_POST['time'];
	$room           = $_POST['room'];
	
	$mysqli->query("UPDATE  ub_laboratory set lab_name  ='$title' ,
										    lab_date  ='$day' ,
										    lab_time  ='$time' ,
										    lab_room  ='$room' 
										    WHERE lab_id  ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Laboratory Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratory.php";
							});
			</script>';
	
}

if(isset($_POST['update-lab-student'])){
	
	$id          = $_POST['labs_id'];
	$computer    = $_POST['computer'];
	$lab_date  	 = $_POST['lab_date'];
	$lab_time    = $_POST['lab_time'];
	$lab_room    = $_POST['lab_room'];
	$data        = $_POST['data'];
	
	$mysqli->query("UPDATE  ub_laboratory_students set computer  ='$computer'
										    WHERE labs_id  ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratory-records.php?data='.$data.'&lab_date='.$lab_date.'&lab_time='.$lab_time.'&lab_room='.$lab_room.'&updated";
							});
			</script>';
	
}