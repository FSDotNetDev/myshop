<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$shipment=$_POST["shipment"];
$detail=$_POST["detail"];
$sql="INSERT INTO shipment(shipment,detail) VALUE ('$shipment','$detail')";
if(!mysql_query($sql,$con))
	{	die('Error: ' . mysql_error());	}
header("Location: shipment_list.php");
mysql_close($con);
?>	
