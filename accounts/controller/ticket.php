<?php
session_start();

include('../controller/database.php');

$teacherid       = $_SESSION['id'];
$ub_tickets      = $mysqli->query("SELECT a.* from ub_tickets a where teacher_id = '$teacherid'");

if($_GET['data'] == 'pending'){
	$status = 0;
}
if($_GET['data'] == 'ongoing'){
	$status = 1;
}
if($_GET['data'] == 'closed'){
	$status = 2;
}
$ub_tickets1      = $mysqli->query("SELECT a.* , b.firstname , b.lastname ,b.id_number from ub_tickets a LEFT JOIN ub_teacher b on a.teacher_id = b.teacher_id where a.status='$status'");

if(isset($_POST['add-ticket'])){
	
	$title          = $_POST['title'];
	$details        = $_POST['details'];
	$id             = $_SESSION['id'];
	$alphabet = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
   
	$transcode =  implode($pass);

	$mysqli->query("INSERT INTO ub_tickets (ticket_number, title , content ,teacher_id,status) 
			VALUES ('$transcode','$title','$details','$id','0')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Ticket Reports Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "ticket.php";
							});
			</script>';
	
}


if(isset($_POST['delete-ticket'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  ub_tickets where ticket_id  ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Ticket is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "ticket.php";
							});
			</script>';
	
}

if(isset($_POST['approved-status'])){
	
	$id       = $_POST['ticket_id'];
	$data     = $_POST['data'];
	
	if($_GET['data'] == 'pending'){
		$status1 = 1;
	}
	if($_GET['data'] == 'ongoing'){
		$status1 = 2;
	}
	
	$mysqli->query("UPDATE ub_tickets set status = '$status1' where ticket_id  ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Ticket is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "tickets.php?data='.$data.'";
							});
			</script>';
	
}
