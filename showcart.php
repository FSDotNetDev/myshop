<html>
<head>																																					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
echo"<center><font size='20'><b>ตะกร้าสินค้า</b></font></center><br><hr><br>";
?>

<?php
include("conn/config.php");
session_start();

	Class MyStruct {
		public $id;
		public $q;
	}

	$data = new MyStruct();

?>

	<table border='1'>
		<tr>
			<th>ชื่อสินค้า</th>
			<th>จำนวน</th>
			<th>ราคา</th>
			<th>รวม</th>
		<form action="editcart.php" method="post" accept-charset="utf-8">
			<? $nettotal = 0;
			if (empty($_SESSION['shoppingcart'])) {
				$_SESSION['shoppingcart'] == null;	}
				if ($_SESSION['shoppingcart'] != null) {
					foreach ($_SESSION['shoppingcart'] as $data) {
						$key = $data->id;
						$sql = "SELECT * FROM product WHERE product_id = " . $key;
						$query = mysql_query($sql);
						$row = mysql_fetch_array($query);
						?>
						<tr>
							<td><?=$row['product_name'];?></td>
							<td><input type="text" name="<?=$key?>" size="1" value="<?=$data->q?>"></td>
							<td align="right"><?=$row['product_price'];?></td>
							<?
							$total = intval($data->q) * intval($row['product_price']);
							$nettotal += $total;
							?>
							<td align="right"><?=$total?></td>
						</tr>
					<? } ?>
				<tr>
					<td colspan="3" align="right">รวม</td>
					<td><?=$nettotal?></td>
				</tr>
			<input type='submit' value='คำนวณใหม่'>
		</form>
	</table>

	<br><br>
	
	<a href="front.php">กลับไปเลือกสินค้า</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="order1.php">ทำรายการสั่งซื้อ</a>

	<? } ?>