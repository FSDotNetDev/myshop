<html>																															
<head>																																					
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
session_start();
Class MyStruct 
	{	public $id;
		public $q;
	}
$data=new MyStruct();
include"config.php";
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: '.mysql_error());		} 
$con2=mysql_connect($host,$username,$password);
if (!$con2)
	{	die('Could not connect: '.mysql_error());		} 
$con3=mysql_connect($host,$username,$password);
if (!$con3)
	{	die('Could not connect: '.mysql_error());		}
mysql_select_db($database,$con); 
mysql_select_db($database,$con2);
mysql_select_db($database,$con3);
mysql_query("SET NAMES UTF8");
$currenttime=time(); 
$ordernumber=$_SESSION['user_id'].$currenttime; 
$userid=$_SESSION['user_id']; 
$shipment=$_SESSION['shipment']; 
$payment=$_SESSION['payment']; 
$address=$_SESSION['address']; 
$sql="INSERT INTO p_order(status,order_no, user_id, shipment, payment,address) 
VALUES('รอรับคำสั่งซื้อ','$ordernumber','$userid','$shipment','$payment','$address')";
if (!mysql_query($sql,$con))
	{	die('Error: '.mysql_error());	}
echo"<h1>สรุปรายการสั่งซื้อ</h1>";
echo"<table border='1'>
<tr>
<th>ชื่อสินค้า</th>
<th>จำนวน</th>
<th>ราคา</th>
<th>รวม</th>
";
echo"<form action='editcart.php' method='post'>";
$nettotal=0;
if($_SESSION["shoppingcart"]!=null)
	{	foreach ($_SESSION["shoppingcart"] as&$data)
			{	$key=$data->id;
				$sql2="SELECT * FROM product WHERE product_id=".$key;
				$result2=mysql_query($sql2);
				$row2=mysql_fetch_array($result2); $pro_id = $data->id; 
				$pro_price =$row2['product_price']; 
				$sql3="INSERT INTO order_detail (order_no,product_id,quantity,product_price)
				VALUES('$ordernumber','$pro_id','$data->q','$pro_price')"; 
				if (!mysql_query($sql3,$con3))
					{	die('Error: '.mysql_error());	}
				echo"<tr><td>".$row2['product_name'];
				echo"<td>".$data->q;
				echo"<td align='right'>".$row2['product_price'];
				$total= intval($data->q)*intval($row2['product_price']);
				$nettotal+=$total;
				echo "<td align='right'>".$total;
			}
		echo"<tr><td colspan='3' align='right'>รวม<td>".$nettotal;
		echo"</table>";
		echo"<br><b>จัดส่งโดย</b><br>&nbsp;&nbsp;&nbsp;".$_SESSION['shipment']; 
		echo"<br><br><b>ที่อยู่จัดส่ง</b><br>&nbsp;&nbsp;&nbsp;".$_SESSION['address']; 
		echo"<br><br><b>วิธีชำระเงิน</b><br>&nbsp;&nbsp;&nbsp;".$_SESSION['payment']; 
		$_SESSION['shipment']=null; 
		$_SESSION['address']=null; 
		$_SESSION["shoppingcart"]=null; 
		echo"<br><br><b>ได้รับคำสั่งซื้อของท่านแล้ว</b>";
	}
?>
