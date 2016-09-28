<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Could not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$id=$_GET["id"];
$name=$_POST["name"];
$desc=$_POST["desc"];
$unit=$_POST["unit"];
$weight=$_POST["weight"];
$available=$_POST["available"];
$on_hand=$_POST["on_hand"];
$sql="UPDATE product_parent SET name='$name' WHERE product_parent_id='$id'";
if(!mysql_query($sql,$con))
	{	die('Error:'.mysql_error());	}
mysql_close($con);
header("Location:product_parent_list.php");
exit();
?>



