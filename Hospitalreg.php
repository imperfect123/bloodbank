<?php 
include("Include/connection.php");

if(isset($_POST['btnsave']))
	{
		echo "ok";
		$name=$_POST['txtname'];
		$uname=$_POST['txtuname'];
		$pwd=$_POST['txtpass'];
		$location=$_POST['sellocation'];
		$contact=$_POST['txtcontact'];
		echo $name.$uname,$pwd.$grp;
		$inq="insert into tbl_hospital(name,username,password,location_id,contact) values('$name','$uname','$pwd',$location,'$contact')";
		mysql_query($inq,$con) or die(mysql_error());
		$sel=mysql_query("select * from tbl_hospital where username='$uname' and password='$pwd'",$con);
		$row=mysql_fetch_array($sel);
		$id=$row['id'];
		
		
		mysql_query("insert into tbl_login(username,password,type,member_id) values('$uname','$pwd','hospital',$id)",$con) or die (mysql_error());
		echo"<script> alert('Resgistration Successfull')</script>";
	}
	



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hospital Reg</title>
</head>

<body>
<form id="frmreg" name="femreg" method="post" action="">
  <table width="200"  align="center">
    <tr>
      
      <td><input type="text" name="txtname" id="txtname" placeholder="Name"/></td>
    </tr>
    <tr>
   
      <td><input type="text" name="txtuname" id="txtuname" placeholder="Username"/></td>
    </tr>
    <tr>

      <td><input type="password" name="txtpass" id="txtpass" placeholder="Password"></td>
    </tr>
        <tr>
    <td>
    <select name="sellocation" id="sellocation">
    <option value="select">---Select Location------</option>
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
    <input type="number" name="txtcontact" id="txtcontact" placeholder="Contact" />
    </td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" value="Register" /></td>
    </tr>
  </table>
</form>

</body>
</html>