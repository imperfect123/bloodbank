<?php

	ob_start();
	include("Include/connection.php");
	
	if(isset($_POST['btnlogin']))
	{
	
			$selQry="select * from tbl_login where username='".$_POST['txtuname']."' and password='".$_POST['txtpass']."' and type='admin'";
        $rsLogin=mysql_query($selQry);
        $count=mysql_num_rows($rsLogin);
		
		$selQry1="select * from tbl_login where username='".$_POST['txtuname']."' and password='".$_POST['txtpass']."' and type='member'";
        $rsLogin1=mysql_query($selQry1);
        $count1=mysql_num_rows($rsLogin1);
		//echo $count1."count1";
		
		$selQry2="select * from tbl_login where username='".$_POST['txtuname']."' and password='".$_POST['txtpass']."' and type='hospital'";
        $rsLogin2=mysql_query($selQry2);
        $count2=mysql_num_rows($rsLogin2);
		//echo $count2."count2";
		
		
						
		 if($count>0)
         {
              session_start();
			  $row=mysql_fetch_array($rsLogin);
              /*$_SESSION['lgname']=$row['admin_username'];
			  $_SESSION['lgid']=$row['admin_id'];*/
              header('location:home.php');
         }
		 elseif($count1>0)
		 {
			 echo "haiiii";
			 session_start();
			 $row=mysql_fetch_array($rsLogin1);
			 $a=$row['member_id'];
			
			  $_SESSION['lgid']=$row['member_id'];
             header('location:home1.php');

		 }
		elseif($count2>0)
		 {
		
			 session_start();
			 $row=mysql_fetch_array($rsLogin2);
			 $a=$row['member_id'];
			
			  $_SESSION['lgid']=$row['member_id'];
             header('location:home3.php');

		 }
		
		else
	  {
		  $str="Invalid Username Or Password";
                 // echo "<script> alert('Invalid Username or password')</script>";
	  }
   }
      
?>
<title>Login</title>
</head>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<style>
*, *:before, *:after {
  box-sizing: border-box;
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
html {
  overflow-y: scroll;
}

body {
  background: #c1bdba;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: #1ab188;
  transition: .5s ease;
}
a:hover {
  color: #179b77;
}

.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}

input, textarea {
	border-radius:10px;
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px dashed #a0b3b0;
  color: #ffffff;
 
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}
.button:hover {
	opacity:1;
}
.button {
	opacity:.5;
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #179b77;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}

</style>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="index.php"><span class="icon-home"></span></a>
					
                    				</div>
				
							</div>
		</div>
	</div>
</div>

<form name="frmLogin" method="post" class="form">
<table width="348"  align="center">
 
  <th colspan="2" align="center">BLOOD DONORS FOURM</th>
  <tr>
    <td width="117">User Name</td>
    <td width="120"><input type="text" name="txtuname" id="txtuname" autocomplete="off" required/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="txtpass" id="txtpass" required/></td>
  </tr>
  <tr>
  <td height="25" colspan="2"><center><?php echo"<font color='#FF0000'>"."<font>".$str;?></center></td>
  </tr>
  <tr>
    
    <td colspan="2" align="center"><input type="submit" name="btnlogin" value="Login" class="button button-block"/></td>  </tr>
  <!--tr>
    <td colspan="2" align="center"><a href="ForgotPassword.php">ForgotPassword...?</a></td-->
  </tr>
<tr>
    <td colspan="2" align="center">New User...? <a href="register.php">Register Here</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center">New Hospital...? <a href="Hospitalreg.php">Register Here</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center">New Ambulance...?<a href="addambulance.php"> Click Here</a></td>
  </tr>
</table>
<p align="center"><label></label></p>

</form>
