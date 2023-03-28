<?php
session_start();

include('../controller/database.php');


$ub_students      = $mysqli->query("SELECT a.* from ub_laboratory a ");
$ub_laboratories  = $mysqli->query("SELECT a.* , b.* ,c.* from ub_teacher_lab a left join ub_section b on b.section_id = a.section left join ub_laboratory c on a.laboratory = c.lab_id");

$lid              = $_GET['data'];

$ub_students_data = $mysqli->query("SELECT a.* , b.* from ub_laboratory_students a LEFT JOIN ub_students b on a.student_id = b.student_id where a.laboratory_id='$lid'");

if(isset($_POST['add-lab'])){
	
	$title          = $_POST['title'];
	$day            = $_POST['day'];
	$stime  	    = $_POST['stime'];
	$etime  	    = $_POST['etime'];
	$room           = $_POST['room'];
	$id             = $_SESSION['id'];
	

	$mysqli->query("INSERT INTO ub_laboratory (lab_name , lab_date ,lab_time,lab_etime,lab_room,teacher_id) 
			VALUES ('$title','$day','$stime','$etime','$room','$id')");

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

if(isset($_POST['add-tlab'])){
	
	$section        = $_POST['section'];
	$laboratory     = $_POST['laboratory'];
	$id             = $_SESSION['id'];
	
	$stud  = $mysqli->query("SELECT * from ub_students where section_id ='$section'");
	while($val = $stud->fetch_object()){ 

	$student   = $val->student_id;
	$mysqli->query("INSERT INTO ub_laboratory_students (student_id , laboratory_id ,section,computer) 
				VALUES ('$student','$laboratory','$section','')");
				
	}

	$mysqli->query("INSERT INTO ub_teacher_lab (section , laboratory ,teacher_id) 
			VALUES ('$section','$laboratory','$id')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Laboratory Details Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratories.php";
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


if(isset($_POST['delete-labs'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  ub_teacher_lab where tl_id   ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Laboratory Details is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratories.php";
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
	$section        = $_POST['section'];
	$laboratory     = $_POST['laboratory'];
	
	$mysqli->query("delete ub_laboratory_students where laboratory_id ='$laboratory' and section = '$section'");
		
	$stud  = $mysqli->query("SELECT * from ub_students where section_id ='$section'");
	while($val = $stud->fetch_object()){ 

	$student   = $val->student_id;
	$mysqli->query("INSERT INTO ub_laboratory_students (student_id , laboratory_id ,computer) 
				VALUES ('$student','$laboratory','')");
			
	
	$mysqli->query("UPDATE  ub_teacher_lab set section  ='$section' ,
										    laboratory  ='$laboratory' 
										    WHERE tl_id   ='$id'
					");
					
   	
	}
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Laboratory Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "laboratories.php";
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
	$section     = $_POST['section'];
	$sectionname = $_POST['section_name'];
	
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
								window.location = "laboratory-records.php?section='.$section.'&section_name='.$sectionname.'&data='.$data.'&lab_date='.$lab_date.'&lab_time='.$lab_time.'&lab_room='.$lab_room.'&updated";
							});
			</script>';
	
}