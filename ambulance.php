<?php
include("Include/connection.php");
if(isset($_POST['btnsearch']))
{
	$str="";
	$lcid=$_POST['selambulance'];
	//echo $lcid;
	$sel=mysql_query("select * from tbl_ambulance where location_id=$lcid",$con);
	$n=mysql_num_rows($sel);
	
	$name[n];
	$contact[n];
	$i=0;
 while($row=mysql_fetch_array($sel))
  {
	  $name[$i]=$row['name'];
	   $contact[$i]=$row['contact'];
  $i++;
  }
}
  

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
select{
	padding:10px;
	font-size:18px;
}
input{
	padding:10px;
	opacity:.8;
  border: 1px solid;
  outline: none;
  border-radius: 10;
  //padding: 15px 0;
  font-size: 1.5rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;

}
td {
	color:white;
	font-size:20px;
}
th {
	color:#FFF;
	font-size:27px;
}
th:hover {
	cursor:not-allowed;
	}

input:hover{
	opacity:1;
	cursor:pointer;
}
body {
  background: #c1bdba;
  
  }
</style>

</head>
<body>
<form id="frm_ambulance" name="frm_ambulance" method="post" action="" >
<div align="center">
  <select name="selambulance" id="selambulance">
  <option value="select">---Select Location------</option>
    <?php
		$sel=mysql_query("select * from tbl_location",$con);
		while($row=mysql_fetch_array($sel))
		{
	
	?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['location_name'];?></option>
    <?php } ?>
    </select>
    <input type="submit" name="btnsearch" value="Search" />
    <table width="200" border="1" >
    <th>Name</th>
    <th>Contact</th>
 

<?php
for($a=0;$a<$i;$a++)
{ ?>
	<tr>
	<td><?php echo $name[$a];?></td>
	<td><?php echo $contact[$a];?></td>
	</tr>
<?php
}
?>

</table>
</div>
</form>
</body>
</html>