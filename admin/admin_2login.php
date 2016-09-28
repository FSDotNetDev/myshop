<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/body.css">
</head>

<br><hr><br>

<?php
session_start();
include"config.php";
$admin=$_POST['admin_name'];
$pass=$_POST['password'];
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: ' . mysql_error());		}
mysql_select_db($database, $con);
mysql_query("SET NAMES UTF8");	//$id=$_GET["id"];
$sql="SELECT * from admin WHERE admin_name='".$admin."' AND password='".$pass."'";
if (!mysql_query($sql,$con))
	{	die('Error: ' . mysql_error());	}
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if($row['admin_name']==$admin AND $row['password']==$pass)
	{	echo "<b>ยินดีต้อนรับ Admin: ".$row['admin_name'];
		$_SESSION['login_success']="success"; 
		$_SESSION['admin_name']=$row['admin_name'];
	}
else
	{	echo "<b>รหัสผ่านไม่ถูกต้อง";	}
mysql_close($con);
?>


