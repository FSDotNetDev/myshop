<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Could not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$id=$_GET["id"];
$payment=$_POST["payment"];
$detail=$_POST["detail"];
$sql="UPDATE payment SET payment='$payment',detail='$detail' WHERE payment_id='$id'";
if(!mysql_query($sql,$con))
	{	die('Error:'.mysql_error());	}
mysql_close($con);
header("Location:payment_list.php");
exit();
?>


