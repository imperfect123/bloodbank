<?php

include("Include/connection.php");
session_start();

$id=$_SESSION['hid'];

$sel=mysql_query("select * from tbl_hospital where id=$id");
$r=mysql_fetch_array($sel);
$lc=$r['location_id'];


$grp=$_POST['sel_bldgrp'];
$stock=$_POST['txtstock'];


if(isset($_POST['btn_save']))
{
	$s=mysql_query("select * from tbl_blood_stock where blood_id=$grp and hospital_id=$id");
	$n=mysql_num_rows($s);
	echo $n."nnnnnnn";
	if($n>0)
	{
		mysql_query("update tbl_blood_stock set stock=$stock where blood_id=$grp and hospital_id=$id");	
	}
	else
	{
mysql_query("insert into tbl_blood_stock(hospital_id,location_id,blood_id,stock) values($id,$lc,$grp,$stock)",$con) or die(mysql_error());
	}
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
      <td>Group</td>
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
      <td>Stock</td>
      <td><input type="number" name="txtstock" /></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <input type="submit" value="Update" name="btn_save" />
    </td>
  </table>
</form>
</body>
</html>