<?php
include("Include/connection.php");
$des=$_POST['txtdes'];
$lc=$_POST['selloc'];
$dte=$_POST['txtdate'];
$tim=$_POST['txttime'];
$contact=$_POST['txtcontact'];

$ti=strtotime( $tim);
$tim=date("h.i A",$ti);

if(isset($_POST['btn_add']))
{
	//echo $des.$lc.$dte.$tim.$contact;
	mysql_query("insert into tbl_notification(location_id,date,time,description,contact) values($lc,'$dte','$tim','$des',$contact)")or die(mysql_error());
}



?>


    
   <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		
<style>
body
{

  background: #c1bdba;
  
  }
button
{
	padding:10px;
	opacity:.8;
  border: 1px solid;
  outline: none;
  border-radius: 10;
  padding: 15px 0;
  font-size: 1.5rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;}

*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password],select,input[type=date],textarea,input[type=time] {
	
    width: 90%;
    padding: 12px 20px;
    margin: 20px 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:20px;
}
input[type=submit]{
	
    width: 50%;
    padding: 12px 20px;
    margin: 20px 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;

}
input[type=submit]:hover{
	background-color:#000;
	color:white;
}
img
{
	border-radius:5px;
	-webkit-transition-duration: 0.6s; 	
	-moz-transition-duration: 0.6s;
	-o-transition-duration: 0.6s;
	transition-duration: 0.6s;
	-webkit-transition-property:-webkit-transform;
	-moz-transition-property:-moz-transform;
	-o-transition-property:-o-transform;
	transition-property: transform;
	overflow:hidden;
}
img:hover	
{
	 -webkit-transform:rotate(50deg);
	  -moz-transform:rotate(50deg);
	   -o-transform:rotate(50deg); 
}

/* Set a style for all buttons */
/*button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}*/
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
	border-radius:10px;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
</style>
<body background="../background1.png">
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
			  <li class="active"><a>THE BLOOD DONORS FORUM(ADMIN DASHBOARD) <span class="icon-user-md"> </span> </a></li>
              <li><a href="delete.php" onClick="msg()">Delete Expired Request<span class="icon-trash"> </span> </a></li>
              <li><a href="logout.php">LOGOUT<span class="icon-power-off"> </span> </a></li>
			  
              		</ul>			
		  </div>
		</div>
	  </div>
	</div>
<button onClick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px;">
Create Notification <span class="icon-envelope"></span></button>

<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" method="post">
        
    
      <span onClick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <!--img src="" alt="Avatar" class="avatar"-->
      <h1  style="text-align:center;font-size:12px">
	  	
  		<textarea name="txtdes" placeholder="Description"></textarea>
       <select name="selloc">
        <option id="sel">--Select Location---</option>
	   <?php
	   $selq=mysql_query("select * from tbl_location");
	   
	   while($row=mysql_fetch_array($selq))
	   {
	   
	   ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['location_name'];?></option>
                <?php }?>
        </select>
        <input type="text" name="txtvenue" placeholder="venue">
        <input type="time" name="txttime">
        <input type="date" name="txtdate">
        <input type="text" name="txtcontact" placeholder="Contact">
        
		<input type="submit" value="ADD" id="btn_add" name="btn_add">
	
	  
	</h1>
    


          
  </form>
</div>
<div align="center" style="margin-top:100px;">	 
		<img src="assets/img/logo.png" alt="bootstrap sexy shop">
	

	</div>


<script>
// If user clicks anywhere outside of the modal, Modal will close
function msg()
{
	alert("Deleted......!!!");
}
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</body>
</html>
