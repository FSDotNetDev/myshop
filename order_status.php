<html>																															
<head>																																					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#000000"><br>
<br><hr><br>

<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: '.mysql_error());	}
mysql_select_db($database, $con);
mysql_query("SET NAMES UTF8");
$id=$_GET["id"];
$status=$_POST["status"];
$sql="UPDATE p_order SET status='$status' WHERE order_no='$id'";
if (!mysql_query($sql,$con))
	{	die('Error: '.mysql_error());	}
mysql_close($con);
header("Location: show_order.php");
exit();
?>
