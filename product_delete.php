<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Could not connect:'.mysql_error());	}
mysql_select_db($database,$con);
$id=$_GET["id"];
$sql="DELETE FROM product WHERE product_id='$id'";
if(!mysql_query($sql,$con))
	{	die('Error:'.mysql_error());	}
mysql_close($con);
header("location:product_list.php");
exit();
?>
