<html>																															
<head>																																					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
echo"<center><font size='20'><b>รายละเอียดคำสั่งซื้อ</b></font></center><br><hr><br>";
?>

<?php
session_start();
$order_no=$_GET['id'];
include"config.php";
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: '.mysql_error());	}
mysql_select_db($database, $con);
mysql_query("SET NAMES UTF8");
echo"<table border='1'>
<tr>
<th>รหัสสินค้า</th>
<th>ชื่อสินค้า</th>
<th>จำนวน</th>
<th>ราคา</th>
<th>รวม</th>
";
$nettotal=0;
$sql="SELECT * FROM order_detail JOIN product on order_detail.product_id=product.product_id WHERE order_detail.order_no='$order_no'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
	{	$nettotal=$nettotal + $row['product_price']*$row['quantity'];
		echo"<tr><td>".$row['product_id'];
		echo"<td>".$row['product_name'];
		echo"<td>".$row['quantity'];
		echo"<td>".$row['product_price'];
		echo"<td>".$row['product_price']*$row['quantity'];
	}
echo"<tr><td colspan='4' align='right'>รวม<td>".$nettotal.".";
echo"</table>";
$sql="SELECT * FROM p_order JOIN user on p_order.user_id=user.user_id WHERE p_order.order_no='$order_no'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
echo"<br><br>ชื่อลูกค้า : ".$row['username'];
echo"<br>วิธีการขนส่ง : ".$row['shipment'];
echo"<br>วิธีการชำระเงิน : ".$row['payment'];
echo"<br>ที่อยู่  : ".$row['address'];
echo"<br><br>สถานะใบสั่งซื้อ  : ".$row['status'];
echo"<br><br>";
?>
