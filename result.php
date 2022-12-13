<?php session_start();?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
    margin:0;
    padding:0;
    font-family:sans-serif;
    background:#fbfbfb;
}
.card {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:400px;
    min-height:450px;
    background:#fff;
    box-shadow:0 20px 50px rgba(0,0,0,.1);
    border-radius:10px;
    transition:0.5s;
}
.card:hover {
    box-shadow:0 30px 70px rgba(0,0,0,.2);
}
.card .box {
    position:absolute;
    top:50%;
    left:0;
    transform:translateY(-50%);
    text-align:center;
    padding:20px;
    box-sizing:border-box;
    width:100%;
}
.card .box .img {
    width:120px;
    height:120px;
    margin:0 auto;
    border-radius:50%;
    overflow:hidden;
}
.card .box .img img {
    width:100%;
    height:100%;
}
.card .box h2 {
    font-size:20px;
    color:#262626;
    margin:20px auto;
}
.card .box h2 span {
    font-size:14px;
    background:#e91e63;
    color:#fff;
    display:inline-block;
    padding:4px 10px;
    border-radius:15px;
}
.card .box p {
    color:#262626;
}
.card .box span {
    display:inline-flex;
}
.card .box ul {
    margin:0;
    padding:0;
}
.card .box ul li {
    list-style:none;
    float:left;
}
.card .box ul li a {
    display:block;
    color:#aaa;
    margin:0 10px;
    font-size:20px;
    transition:0.5s;
    text-align:center;
}
.card .box ul li:hover a {
    color:#e91e63;
    transform:rotateY(360deg);
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="card">
    <div class="box">
		<center><img src="accounts/assets/logo.png" width="200px"></center>
		<?php if(isset($_GET['success'])){?>
		<b>WELCOME </b>
        <div class="img">
            <img src="accounts/assets/student/<?php echo  $_SESSION['photo'];?>">
        </div>
         <p> <b> NAME</b> <br> <?php echo $_SESSION['name'];?></p> 
		 <p>  <b> LABORATORY</b> <br> <?php echo strtoupper($_SESSION['lab_name']);?></p> 
         <p> <b>COMPUTER / PC NAME </b>   <br> <?php echo $_SESSION['computer'];?></p>
		<?php } else { ?>
		<hr> <br>
		<b>SORRY YOU LOGIN LATE TO YOUR LABORATORY SCHEDULE!</b>
		<?php } ?>
    </div>
</div>

<script>
  setTimeout(function () {
       window.location.href = "index.php"; 
    }, 4000); 
</script>
