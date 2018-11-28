
</script>

<select name="selhospital" id="selhospital">
  <option value="sel">---select---</option>
  	<?php
  				//echo("Hello");
  				   ob_start();
	               include("Include/connection.php");
				   
				$id=$_REQUEST["id"];
				echo $id;   
				$Selquery="select * from tbl_hospital where location_id=$id";
				echo $Selquery;
  				$sel=mysql_query($Selquery,$con);
				   
				while($data=mysql_fetch_array($sel))
					{
						$hid=$data["id"];
						$hname=$data["name"];
	?>
    		<option value="<?php echo $hid; ?>"><?php echo $hname; ?></option>
    <?php
		}
 	 ?>
</select>