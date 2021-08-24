<?php
include "../class.dbcon.php";
$_Con=new Con;
$type=$_GET["type"];
?>
 <select name="location" id="location" required>
	<option value="" disabled selected>Choose One Prefered Location *</option>
	<?php
	$Sql2 ="CALL `SP_Web_Locations`('Select','$type','')";
	$Rs = $_Con->prepare($Sql2); 
	$Rs->execute();
	$Rs->setFetchMode(PDO::FETCH_ASSOC);										
	while($rw2 = $Rs->fetch())
	{ 
	?>
		<option value="<?php echo $rw2['ID'] ?>"><?php echo $rw2['Location_DisplayName']; ?></option>
	<?php
	}
	?>
</select>