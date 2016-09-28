<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$payment=$_POST["payment"];
$detail=$_POST["detail"];
$sql="INSERT INTO payment(payment,detail) VALUE ('$payment','$detail')";
if(!mysql_query($sql,$con))
	{	die('Error: ' . mysql_error());	}
header("Location: payment_list.php");
mysql_close($con);
?>	
