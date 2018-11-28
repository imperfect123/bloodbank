<?php
include("Include/connection.php");
$name=$_POST['txtname'];
$location=$_POST['sel_location'];
$group=$_POST['sel_bldgrp'];
$conatct=$_POST['txtcontact'];
$dte=$_POST['txtdate'];
$tim=$_POST['txttime'];
$ti=strtotime( $tim);
$tim=date("h.i A",$ti);
if(isset($_POST['btn_rqst']))
{
	//echo"ok".$name.$location.$group.$conatct.$dte;
	mysql_query("insert into tbl_request(name,bgrp,location,date,contact,time) values ('$name',$group,$location,'$dte','$conatct','$tim')",$con) or die(mysql_error());
	
}

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

body{
	background-color:#c1bdba;
}
tr{
	font-size:18px;
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
              <li ><a href="home1.php">BACK TO HOME<span class="icon-home"> </span> </a></li>
</ul>
</div>
</div>
</div>
</div>
<form id="frm_request" name="frm_request" method="post" action="">
  <table width="200"  align="center">
    <tr>
    <td>
    Name
    </td>
    <td>
    <input type="text" name="txtname" id="txtname" />
    </td>
    </tr>
    <tr>
      <td>Location</td>
      <td><select name="sel_location">
      		<option value="select">--Select---</option>
            <?php
				$sel=mysql_query("select * from tbl_location",$con);
				while($row=mysql_fetch_array($sel))
				{
				
			?>
          		<option value="<?php echo $row['id']; ?>"><?php echo $row['location_name'];?></option>
                <?php }?>
            </select>
      </td>
    </tr>
    <tr>
      <td>Blood Group</td>
      <td><select name="sel_bldgrp">
      		<option value="select">--Select---</option>
            <?php
				$sel=mysql_query("select * from tbl_blood",$con);
				while($row=mysql_fetch_array($sel))
				{?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['group'];?></option>
                <?php }?>
            </select>
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="number" id="txtcontact" name="txtcontact" /></td>
    </tr>
    <tr>
      <td>Date</td>
      <td><input type="date" id="txtdate" name="txtdate"  /></td>
    </tr>
    <tr>
    <tr>
    	<td>Time</td>
        <td><input type="time" name="txttime" id="txttime" /></td>
    </tr>
      <td colspan="2" align="center"><input type="submit" name="btn_rqst"value="Request" /></td>
     
    </tr>
  </table>
</form>
<script>
</
</body>
</html>