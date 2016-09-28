<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$name=$_POST["name"];
$sql="INSERT INTO 
product_parent(name)
VALUE ('$name')";
if(!mysql_query($sql,$con))
	{	die('Error: ' . mysql_error());	}
header("Location: product_parent_list.php");
mysql_close($con);
?>	
