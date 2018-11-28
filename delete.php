<?php
include("Include/connection.php");
$d=date("Y-m-d");



mysql_query("delete from tbl_request where date<'$d'",$con) or die(mysql_error());
mysql_query("delete from tbl_notification where date<'$d'",$con) or die(mysql_error());
session_start();
session_destroy();
header("location:home.php");

/*
$sel=mysql_query("select * from tbl_notification",$con);

while($row=mysql_fetch_array($sel))
{
if($row['date']<$d)
{
	$id=$row['id'];
	mysql_query("delete from tbl_notification where id=$id",$con) or die(mysql_error());
}
}*/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>