<?php
ob_start();
 include("Include/Connection.php");
session_start();
session_destroy();
header("location:index.php");

exit; 
 ?>