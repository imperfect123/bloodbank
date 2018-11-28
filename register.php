<?php
	include("Include/connection.php");
	if(isset($_POST['btnsave']))
	{
		echo "ok";
		$name=$_POST['txtname'];
		$uname=$_POST['txtuname'];
		$pwd=$_POST['txtpass'];
		$grp=$_POST['selgrp'];
		$age=$_POST['txtage'];
		$location=$_POST['sellocation'];
		$contact=$_POST['txtcontact'];
		$address=$_POST['txtaddress'];
		echo $name.$uname,$pwd.$grp;
		$inq="insert into tbl_user(name,username,password,bgrp,age,location_id,address,contact) values('$name','$uname','$pwd','$grp','$age',$location,'$address','$contact')";
		mysql_query($inq,$con) or die(mysql_error());
		$r="select * from tbl_user where username='$uname' and password='$pwd'";
		echo $r;
		$sel=mysql_query("select * from tbl_user where username='$uname' and password='$pwd'",$con);
		$row=mysql_fetch_array($sel);
		$id=$row['id'];
		
		
		mysql_query("insert into tbl_login(username,password,type,member_id) values('$uname','$pwd','member',$id)",$con) or die (mysql_error());
		echo"<script> alert('Resgistration Successfull')</script>";
	}
	



?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
</head>
<style>
body{
	background-color:#c1bdba;
}
</style>
<body>
<form id="frmreg" name="femreg" method="post" action="">
  <table width="200"  align="center">
    <tr>
      
      <td><input type="text" name="txtname" id="txtname" placeholder="Name" required="required" onkeyup="press1(this.value)" autocomplete="off"/></td>
    </tr>
    <tr>
   
      <td><input type="text" name="txtuname" id="txtuname" placeholder="Username" required="required" autocomplete="off"/></td>
    </tr>
    <tr>

      <td><input type="password" name="txtpass" id="txtpass" placeholder="Password" required="required" autocomplete="off"></td>
    </tr>
    <tr>

      <td><input type="number" name="txtage" id="txtage" placeholder="Age" required="required" autocomplete="off"></td>
    </tr>
    <tr>
    <td><select name="selgrp" id="selgrp">
    <option value="sel">---Select Blood Group--</option>
    <?php
		$sel=mysql_query("select * from tbl_blood",$con);
		while($row=mysql_fetch_array($sel))
		{
	
	?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['group'];?></option>
    <?php } ?>
      </select></td>
    </tr>
    <tr>
    <td>
    <select name="sellocation" id="sellocation">
    <option value="sel">---Select Location------</option>
    <?php
		$sel=mysql_query("select * from tbl_location",$con);
		while($row=mysql_fetch_array($sel))
		{
	
	?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['location_name'];?></option>
    <?php } ?>
    </select>
    </td>
    </tr>
    <tr>
    <td>
    <input type="number" name="txtcontact" id="txtcontact" placeholder="Contact" required="required" onblur="return phno(this.value)" onkeyup="press(this.value)" autocomplete="off"/>
    </td>
    </tr>
    <tr>
    <td><textarea rows="5" cols="15" id="txtaddress" name="txtaddress" placeholder="Address" autocomplete="off"></textarea>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" value="Register" onclick="return validatenull(form1)" /></td>
    </tr>
  </table>
</form>
<script>
  function validatenull(frm)
	{
		alert("ok");
		if(frm.selgrp.value=="sel")
		{
			alert("Select a Group");
			return false;
		}
		if(frm.sellocation.value=="sel")
		{
			alert("Select a Location");
			return false;
		}
	}
	function phno(inpu)
{
	var ph=/^\d{10}$/;
	var a=inpu.match(ph);
	
	if(a==null)
	{
		alert("*Enter a 10 Digit Number");
		//alert("Enter a 10 Digit Number");
		document.getElementById('txtcontact').value="";
		document.getElementById('txtname').focus();
		
	}
	
	return false;

		
	}
	function press(num)
{
	if(isNaN(num))
	{
		//document.getElementById('cn').innerHTML="Numbers Only Accepted";
	alert("Numbers Only Accepted");
	document.getElementById('txtcontact').value="";
	document.getElementById('txtemail').focus();
	//num.focus();
	}

}
function press1(num)
{
	if(!isNaN(num))
	{
		//document.getElementById('cn').innerHTML="Numbers Only Accepted";
	alert("Character Only Accepted");
	document.getElementById('txtname').value="";
	
	//num.focus();
	}

}

	</script>

</body>
</html>