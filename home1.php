<?php 

session_start(); 
include("Include/connection.php");
$id=$_SESSION['lgid'];

$selq=mysql_query("select * from tbl_user where id=$id");

$row=mysql_fetch_array($selq);

$_SESSION['gr']=$row['bgrp'];
$_SESSION['lc']=$row['location_id'];
/*echo "name : ".$row['name'];
echo "grp : ".$row['bgrp'];
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <style>
	
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

body{
	background-color:#c1bdba;
}/* Full-width input fields */
input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}
th,tr,td{
	position:relative;
	padding:20px;
}
td{
	font-size:20px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;*
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}
.mydiv
{
	height:50px;
	width:50px;
	color:white;
	border-radius:50%;
	background-color:red;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

body
{

  background: #c1bdba;
  
  }
  <style>

.a
{
	width:100%;
}
.b
{
	width:30%;
	float:left;
}
.c
{
	width:70%;
	float:left;
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

<body>
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
			  <li class="active"><a>THE BLOOD DONORS FORUM(USER DASHBOARD) <span class="icon-user"> </span> </a></li>
              <li ><a href="request.php">REQUEST<span class="icon-download-alt"> </span> </a></li>
              
              <li ><a href="viewhospital.php">FIND HOSPITAL<span class="icon-hospital"> </span> </a></li>
              <li ><a href="deletereq.php">Delete Your Request<span class="icon-trash"> </span> </a></li>
              <?php
			  $a=mysql_query("select * from tbl_notification",$con);
			  $n=mysql_num_rows($a);
			   ?>
              <li style="cursor:pointer"> <a onClick="document.getElementById('modal-wrapper').style.display='block'">NOTIFICATION<span class="mydiv"> <?php echo $n; ?> </span><span class="icon-bell"></span></a></li>
              <?php
			  $a=mysql_query("select * from tbl_request",$con);
			  $n=mysql_num_rows($a);
			   ?>
              <li style="cursor:pointer"><a onClick="document.getElementById('modal-wrapper1').style.display='block'">MESSAGES<span class="mydiv"> <?php echo $n; ?> </span><span class="icon-envelope"></span></a>
              </li>
              <li ><a href="logout.php">LOGOUT<span class="icon-power-off"> </span> </a></li>
			  
              		</ul>			
		  </div>
		</div>
	  </div>
	</div>
    <div id="gototop"> </div>


<div align="center" style="margin-top:100px;">	 
		<img src="assets/img/logo.png" alt="bootstrap sexy shop">
	

	</div>

<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="assets/img/1528893550-blood.jpg" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Notifications</h1>
    </div>
		
    <div class="container">
      <table align="center">
      <th>Event</th>
      <th>Date</th>
      <th>Time</th>
      <th>Venue</th>
	  <?php
		$sel=mysql_query("select * from tbl_notification",$con);  
	 
      while($row=mysql_fetch_array($sel))
	  {
		 
	  ?>
      <tr>
      <td><?php echo $row['description'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['time'];?></td>
      <td><?php echo $row['venue'];?></td>
      </tr>
      <?php }?>
      </table>
    </div>
    
  </form>
  
</div>
<div id="modal-wrapper1" class="modal">
<form class="modal-content animate" action="/action_page.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper1').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="assets/img/05498_HD.jpg" si alt="Avatar" class="avatar">
      <h1 style="text-align:center">Pending Requests</h1>
    </div>

    <div class="container">
      <table>
      <th>Name</th>
      <th>Date</th>
      <th>Time</th>
      <th>Contact</th>
	  <?php
		$sel=mysql_query("select * from tbl_request",$con);  
	 
      while($row=mysql_fetch_array($sel))
	  {
		 
	  ?>
      <tr>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['time'];?></td>
      <td><?php echo $row['contact'];?></td>
      </tr>
      <?php }?>
      </table>
    </div>
    
  </form>
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>