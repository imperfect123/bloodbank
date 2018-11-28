<?php
	include("Include/connection.php");
	$name=$_POST['txtname'];
	$contact=$_POST['txtcontact'];
	$location=$_POST['selloc'];
	echo $name.$contact.$location;
	if(isset($_POST['btnadd']))
	{
		//echo "insert into tbl_ambulance(name,location_id,contact) values('$name',$location,'$contact'";
		mysql_query("insert into tbl_ambulance(name,location_id,contact) values('$name',$location,'$contact')",$con) or die(mysql_error());
		
		echo "<script>alert('Addded SuccessFully')</script>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" align="center">
    <tr>
      <td>Location</td>
      <td><select name="selloc">
      		<option value="sel">--Select---</option>
            <?php
			$sel=mysql_query("select * from tbl_location",$con);
			while($row=mysql_fetch_array($sel))
			{
			?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['location_name'];?> </option>
            <?php } ?>
            </select>	
            </td>
    </tr>
   <tr>
      <td></td>
      <td style="color:red"><div id="divl"></div></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="txtname" required="required" /></td>
    </tr>
    
    <tr>
      <td>Contact</td>
      <td><input type="number" name="txtcontact" required="required" onblur="return phno(this.value)" onkeyup="press(this.value)" /></td>
    </tr>
    <tr>
      <td></td>
      <td style="color:red"><div id="cn"></div></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" value="JOIN" onclick="return validatenull(form1)" /></td>
     
    </tr>
  </table>
</form>
<script>
  function validatenull(frm)
	{
		
		if(frm.selloc.value=="sel")
		{
			document.getElementById("divl").innerHTML="* Select a Location";
			return false;
		}
	}
	function phno(inpu)
{
	var ph=/^\d{10}$/;
	var a=inpu.match(ph);
	
	if(a==null)
	{
		document.getElementById('cn').innerHTML="*Enter a 10 Digit Number";
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

	</script>
</body>
</html>