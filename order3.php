<html>																															
<head>																																					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
session_start();
include"config.php";
$payment=$_POST['payment']; 
$_SESSION['payment']=$payment; 
Class MyStruct 
	{	public $id;
		public $q;
	}
$data=new MyStruct();
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: ' . mysql_error());		}
mysql_select_db($database, $con);
mysql_query("SET NAMES UTF8");
echo"<h1>สรุปรายการสั่งซื้อ</h1><form action='submitorder.php' method='post'>"; 
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
	{	foreach ($_SESSION["shoppingcart"] as &$data)	
			{	$key=$data->id;
				$sql="SELECT * FROM product WHERE product_id=".$key;
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				echo"<tr><td>".$row['product_name'];
				echo"<td>".$data->q;
				echo"<td align='right'><font color='white'>".$row['product_price'];
				$total=intval($data->q)*intval($row['product_price']);
				$nettotal+=$total;
				echo"<td align='right'>".$total;
			}
		echo"<tr><td colspan='3' align='right'>รวม<td>".$nettotal;
		echo"</table>";
		echo"<br><b>จัดส่งโดย</b><br>&nbsp;&nbsp;&nbsp;".$_SESSION['shipment']; 
		echo"<br><br><b>ที่อยู่จัดส่ง</b><br>&nbsp;&nbsp;&nbsp;".$_SESSION['address']; 
		echo"<br><br><b>วิธีชำระเงิน</b><br>&nbsp;&nbsp;&nbsp;".$_SESSION['payment']; 
		echo"<br><br><input type='submit' value='ยืยยันคำสั่งซื้อ'> </form>";
	}
?>
