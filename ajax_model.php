<?php
session_start();
include "class.dbcon.php";
$_Con=new Con;
$Brand_ID=$_GET["model"];
?>
<select name="model" id="model" required>
<option value="" disabled selected>Choose Model *</option>
	<?php
	$Sql2 ="CALL `SP_Web_Mas_Vehicle_Model`('Sel_Model_Brand', $Brand_ID, '')";
	$Rs = $_Con->prepare($Sql2);
	$Rs->execute();
	$Rs->setFetchMode(PDO::FETCH_ASSOC);										
	while($rw2 = $Rs->fetch())
	{ ?>
	<option value="<?php echo $rw2['Model_ID'] ?>"><?php echo $rw2['Model_Name']; ?></option>
	<?php } ?>
</select>