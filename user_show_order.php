<html>																															
<head>																																					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
echo"<center><font size='20'><b>รายการที่เคยสั่งซื้อ</b></font></center><br><hr><br>";
?>

<?php 
session_start();
include"config.php";
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: '.mysql_error());		}
mysql_select_db($database, $con); 
mysql_query("SET NAMES UTF8");
$user_id=$_SESSION['user_id']; $sql = "SELECT * FROM p_order JOIN user on p_order.user_id=user.user_id WHERE p_order.user_id='$user_id'"; 
$result=mysql_query($sql); 
echo"<table border='1'>
<tr>
<th>รหัสคำสั่งซื้อ</th>
<th>วันที่ซื้อ</th> 
<th>ชื่อลูกค้า</th>
<th></th>
</tr>";
while($row = mysql_fetch_array($result))
	{	$id=$row['order_no'];
		echo"<tr>";
		echo"<td>".$row['order_no']."</td>";
		echo"<td>".$row['orderdate']."</td>"; 
		echo"<td>".$row['username']."</td>";
		echo"<td> <a href='user_show_order2.php?id=".$row['order_no']."'>แสดง</a>"."</td>";
		echo"</tr>";
	}
echo"</table>";
mysql_close($con);
?>
