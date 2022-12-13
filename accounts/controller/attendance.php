<?php
session_start();

include('../controller/database.php');


if(isset($_POST['filter'])){
$date = $_POST['date'];
$ub_students_data = $mysqli->query("SELECT a.* , b.* ,c.* ,d.* from ub_lab_attendance a 
									LEFT JOIN ub_students b on a.student_id = b.student_id 
									LEFT JOIN ub_laboratory_students c on a.laboratory_id = c.laboratory_id 
									LEFT JOIN ub_laboratory d on a.laboratory_id = d.lab_id 
									where DATE(a.attendance_date)  = '$date'
									");

} else {
$date = date('Y-m-d');
$ub_students_data = $mysqli->query("SELECT a.* , b.* ,c.* ,d.* from ub_lab_attendance a 
									LEFT JOIN ub_students b on a.student_id = b.student_id 
									LEFT JOIN ub_laboratory_students c on a.laboratory_id = c.laboratory_id 
									LEFT JOIN ub_laboratory d on a.laboratory_id = d.lab_id 
									where DATE(a.attendance_date)  = '$date'
									");

}