<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> New Document </title>
<meta name="Generator" content="EditPlus">
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: '.mysql_error());		}
mysql_select_db($database, $con);
$username=$_POST["username"];
$password=$_POST["password"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$address=$_POST["address"];
$mobile=$_POST["mobile"];
$email=$_POST["email"];
$sql="INSERT INTO user(username,password,firstname,lastname,address,mobile,email)
VALUES('$username','$password','$firstname','$lastname','$address','$mobile','$email')";
if (!mysql_query($sql,$con))
	{	die('Error: '.mysql_error());	}	//header("Location: product_list.php");
echo"<center><font size='20'><b>เพิ่มข้อมูลเรียบร้อยแล้ว</b></font></center><br><hr><br>";
mysql_close($con);
?>
