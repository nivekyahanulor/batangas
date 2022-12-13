<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	include('controller/database.php');

	$settings_val = $mysqli->query("SELECT * from pos_settings");
     $sval = $settings_val->fetch_row();
	
	?>
	
    <title><?php echo $sval[1];?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="admin/assets/logo/<?php echo $sval[7];?>">
    <link rel="icon" type="image/png" sizes="32x32" href="admin/assets/logo/<?php echo $sval[7];?>g">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/assets/logo/<?php echo $sval[7];?>">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/logo/<?php echo $sval[7];?>">
    <meta name="msapplication-TileImage" content="admin/assets/logo/<?php echo $sval[7];?>">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>

