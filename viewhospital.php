<?php
include("Include/connection.php");
$lc=$_POST['sellocation'];
$h=$_POST['selhospital'];
$b=$_POST['selgrp'];

if(isset($_POST['btn_search']))
{
	//echo "select * from tbl_blood_stock where hospital_id=$h and blood_id=$b";
	$sel=mysql_query("select * from tbl_blood_stock where hospital_id=$h and blood_id=$b",$con) or die(mysql_error());
	$row=mysql_fetch_array($sel);
	$stock=$row['stock']." Units Available";
	//echo $stock;
}
?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hospital Details</title>
</head>

<body style="background-color:"#c1bdba">
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

<form id="form1" name="form1" method="post" action="">
  <table width="200" align="center" >
    <tr>
      <td>Location</td>
      <td><select name="sellocation" onchange="LoadHospital(this.value)">
      <option value="sel">--Select</option>
      
	  <?php
	  	$sel=mysql_query("select * from tbl_location",$con);
		while($row=mysql_fetch_array($sel))
		{
	  
	  ?>
         <option value="<?php echo $row['id']; ?>"><?php echo $row['location_name']; ?></option>
         <?php }?>   
      </select></td></tr>
      <tr>
      <td></td>
      <td style="color:red"><div id="divl"></div></td>
    </tr>
    <tr>
      <td>Hospital</td>
      <td><div id="divh"><select name="selhospital">
      <option value="sel">--Select---</option>
      </select></div></td></tr>
      <tr>
      <td></td>
      <td style="color:red"><div id="divhos"></div></td>
    </tr>
    <tr>
      <td>Blood Group</td>
      <td><select name="selgrp">
      <option value="sel">--Select---</option>
      
	  <?php
	  	$sel=mysql_query("select * from tbl_blood",$con);
		while($row=mysql_fetch_array($sel))
		{
	  
	  ?>
         <option value="<?php echo $row['id']; ?>"><?php echo $row['group']; ?></option>
         <?php }?>   
      </select></td></tr>
      <tr>
      <td></td>
      <td style="color:red"><div id="divb"></div></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <input type="submit" value="Search" name="btn_search" onclick="return validatenull(form1)" />
    </td>
    </tr>
    <tr>
    <td colspan="2" style="color:red" align="center"><?php echo $stock;?></td>
    </tr>
  </table>
  
  </form>

  <script>
  function validatenull(frm)
	{
		
		if(frm.sellocation.value=="sel")
		{
			document.getElementById("divl").innerHTML="* Select a Location";
			return false;
		}
		if(frm.selhospital.value=="sel")
		{
			document.getElementById("divhos").innerHTML="* Select a Hospital";
			return false;
		}
		if(frm.selgrp.value=="sel")
		{
			document.getElementById("divb").innerHTML="* Select a Group";
			return false;
		}
	}

function LoadHospital(str)
		{
			
				var xmlhttp;
				if (window.XMLHttpRequest)
  					{
 						 xmlhttp=new XMLHttpRequest();
  					}
				else
  					{
 						 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  					}
  
					xmlhttp.open("GET","loadhospitals.php?id="+str,true);
					xmlhttp.send();
  
					xmlhttp.onreadystatechange=function() //readystate--1  send request  2---server recieved  3--processs 4 ---return
  					{
  						if(xmlhttp.readyState==4 && xmlhttp.status==200)
    						{
    								//alert("ok");
									document.getElementById("divh").innerHTML=xmlhttp.responseText;
									//alert(xmlhttp.responseText);
    						}
  					}
		}		
</script>
</body>
</html>