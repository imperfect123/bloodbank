<?PHP
include("Include/connection.php");
session_start();
$grp=$_SESSION['gr'];
$lc=$_SESSION['lc'];
//echo $lc;
$selq=mysql_query("select * from tbl_request where bgrp=$grp and location=$lc",$con);
?>
<!DOCTYPE html>
<html>
<title>Modal Popup Box</title>


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

</style>
<body style="background-color:#c1bdba;">
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
                  	<a onClick="document.getElementById('modal-wrapper').style.display='block'"><span class="icon-bell"></span></a>
                    <a onClick="document.getElementById('modal-wrapper1').style.display='block'"><span class="icon-bell-alt"></span></a>
                  </div>
				
							</div>
		</div>
	</div>
</div>


<!--button onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px;">
Notifications</button><br-->
<!--button onclick="document.getElementById('modal-wrapper1').style.display='block'" style="width:200px;">
Request</button-->
<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="1.png" alt="Avatar" class="avatar">
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
      <img src="" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Modal Popup Box</h1>
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
