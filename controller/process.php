<?php

	ob_start();
	session_start();
	include('database.php');

	$student_number = mysqli_real_escape_string($mysqli,$_POST['student_number']);

	$sql      = "SELECT * FROM ub_students WHERE id_number='$student_number'";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	if($rows==1){
		$studentid = $row['student_id'];
		$ub_students_data = $mysqli->query("SELECT a.* , b.* ,c.* from ub_laboratory_students a 
											LEFT JOIN ub_students b on a.student_id = b.student_id 
											LEFT JOIN ub_laboratory c on c.lab_id  = a.laboratory_id 
											where a.student_id='$studentid'");
										
										
		while($val = $ub_students_data->fetch_object()){
			$lab_id  = $val->lab_id;
			if($val->lab_date == date("l")){
				$t1 = strtotime(date("H:i:s"));
				$t2 = strtotime($val->lab_time.':00');
				echo $hours = ($t1 - $t2)/3600;   //$hours = 1.7
				if($hours  >= '0.25'){
					header("location:../result.php?late");
				} else {
					$_SESSION['name']     = $row['firstname'].' '. $row['lastname'];
					$_SESSION['id']       = $row['id_number'];
					$_SESSION['photo']    = $row['photo'];
					$_SESSION['computer'] = $val->computer;
					$_SESSION['lab_name'] = $val->lab_name;
					
					$mysqli->query("INSERT INTO ub_lab_attendance (student_id ,laboratory_id) 
					VALUES ('$studentid','$lab_id')");
					header("location:../result.php?success");
				}
			
			} else {
				header("location:../index.php?error");
			}
		}

	
		
	} else { 
		header("location:../index.php?error");
	}
