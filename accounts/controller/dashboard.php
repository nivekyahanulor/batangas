<?php
include('../controller/database.php');




$pos_users = $mysqli->query("SELECT count(*)ub_users from ub_users");
while($valpos_users = $pos_users->fetch_object()){ 
		$totalpos_users =  $valpos_users->pos_users;
}


$ticket_pending = $mysqli->query("SELECT count(*)pending from ub_tickets where status = 0");
while($valticket_pending = $ticket_pending->fetch_object()){ 
		$total_pending=  $valticket_pending->pending;
}

$ticket_approved = $mysqli->query("SELECT count(*)approved from ub_tickets where status = 1");
while($valticket_approved = $ticket_approved->fetch_object()){ 
		$total_approved =  $valticket_approved->approved;
}

$ticket_closed = $mysqli->query("SELECT count(*)closed from ub_tickets where status = 2");
while($valticket_closed = $ticket_closed->fetch_object()){ 
		$total_closed =  $valticket_closed->closed;
}

$total_teacher = $mysqli->query("SELECT count(*)ub_teacher from ub_teacher");
while($valtotal_teacher = $total_teacher->fetch_object()){ 
		$total_t =  $valtotal_teacher->ub_teacher;
}
$total_student = $mysqli->query("SELECT count(*)ub_students from ub_students");
while($valtotal_students = $total_student->fetch_object()){ 
		$total_s =  $valtotal_students->ub_students;
}
$total_lab = $mysqli->query("SELECT count(*)ub_laboratory from ub_laboratory");
while($valtotal_lab = $total_lab->fetch_object()){ 
		$total_l =  $valtotal_lab->ub_laboratory;
}


if(isset($_POST['attendance'])){
	
	$studentid =  $_SESSION['id'];
	$lab_id =  $_POST['laboratory_id'];
					
	$mysqli->query("INSERT INTO ub_lab_attendance (student_id ,laboratory_id,status) 
	VALUES ('$studentid','$lab_id',1)");
	
	$mysqli->query("UPDATE ub_laboratory_students set asttatus = 1 where student_id = '$studentid' and laboratory_id = '$lab_id'");
	   echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Attenadance Success",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "home.php";
							});
			</script>';
}

if(isset($_POST['out'])){
	
	$studentid =  $_SESSION['id'];
	$lab_id =  $_POST['laboratory_id'];
					
	$mysqli->query("INSERT INTO ub_lab_attendance (student_id ,laboratory_id,status) 
	VALUES ('$studentid','$lab_id',2)");
	
	$mysqli->query("UPDATE ub_laboratory_students set asttatus = 0 where student_id = '$studentid' and laboratory_id = '$lab_id'");
	   echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Out Success",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "home.php";
							});
			</script>';
}