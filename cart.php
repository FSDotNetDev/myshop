<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Phone Shop</title>
	<link href="css/body.css" rel="stylesheet" type="text/css">
</head>

<br><hr><br><center><font size="20"><b>ตะกร้าสินค้า</b></font></center><br><hr><br>

<?php
include("conn/config.php");
session_start();

	Class MyStruct {	
		public $id;
		public $q;
	}

	$id = $_GET['id'];
	$q = $_POST['q'];

	if (empty($_SESSION['shoppingcar'])) {
		$_SESSION['shoppingcart'] = null;	
	}

	if ($_SESSION['shoppingcart'] == "") {	
		$cart = new MyStruct();
		$cart->id = $id;
		$cart->q = $q;
		$shoppingcart[$id]=$cart;
		$_SESSION["shoppingcart"]=$shoppingcart;
	} else {
		$shoppingcart = $_SESSION['shoppingcart']; 
		$old_q = $shoppingcart[$id]->q;
		$cart = new MyStruct();
		$cart->id = $id;
		$cart->q = $q + $old_q;
		$shoppingcart[$id] = $cart;
	}

	if ($id != null) { ?>

		<table border="1">
			<tr>
				<th>ชื่อสินค้า</th>
				<th>จำนวน</th>
				<th>ราคา</th>
				<th>รวม</th>
			</tr>
			<form action="editcart.php" method="post">

			<? if ($_SESSION['shoppingcart'] != "") {
				$nettotal=0;
					foreach ($shoppingcart as &$data) {	
						$key = $data->id;
						$sql = "SELECT * FROM product WHERE product_id = " . $key;
						$result = mysql_query($sql);
						$row = mysql_fetch_array($result);
						?>		  
						<tr>
							<td><?=$row['product_name'];?></td>
							<td><input type="text" name="<?=$key?>" size="1" value="<?=$data->q?>"></td>
							<td align="right">
								<?
								$row['product_price'];
								$total = intval($data->q) * intval($row['product_price']);
								$nettotal += $total;
								?>
							</td>
							<td align="right"><?=$total?></td>
						</tr>
					<? } ?>
				<tr>
					<td colspan="3" align="right">รวม</td>
					<td><?=$nettotal?></td>
				</tr>
				<input type="submit" value="คำนวณใหม่">
			</form>			
		</table>

		<br><br>
		
		<a href="front.php">กลับไปเลือกสินค้า</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="order1.php">ทำรายการสั่งซื้อ</a>

		<? }
	}
?>