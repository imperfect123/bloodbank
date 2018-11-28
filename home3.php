<?php 
session_start(); 
include("Include/connection.php");

$id=$_SESSION['lgid'];
$_SESSION['hid']=$id;


$selq=mysql_query("select * from tbl_hospital where id=$id");
$row=mysql_fetch_array($selq);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo HOSPITAL."  (".$row['name'].")"; ?></title>
</head>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <style>
	body
{

  background: #c1bdba;
  
  }
  img
{
	border-radius:5px;
	-webkit-transition-duration: 0.6s; 	
	-moz-transition-duration: 0.6s;
	-o-transition-duration: 0.6s;
	transition-duration: 0.6s;
	-webkit-transition-property:-webkit-transform;
	-moz-transition-property:-moz-transform;
	-o-transition-property:-o-transform;
	transition-property: transform;
	overflow:hidden;
}
img:hover	
{
	 -webkit-transform:rotate(50deg);
	  -moz-transform:rotate(50deg);
	   -o-transform:rotate(50deg); 
}
	</style>
<body background="../background1.png">
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a>THE BLOOD DONORS FORUM(HOSPITAL DASHBOARD) <span class="icon-user-md"> </span> </a></li>
              <li class="active"><a href="update_blood.php">UPDATE BLOOD DETAILS <span class="icon-tint"> </span> </a></li>
              <li class="active"><a href="logout.php">LOGOUT<span class="icon-arrow-down"> </span> </a></li>
			  
              		</ul>			
		  </div>
		</div>
	  </div>
	</div>


<div align="center" style="margin-top:100px;">	 
		<img src="assets/img/logo.png" alt="bootstrap sexy shop">
	

	</div>
</body>
</html>