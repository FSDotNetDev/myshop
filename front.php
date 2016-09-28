<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>

<br><hr><br><center><font size="20"><b>รายการสินค้า</b></font></center><br><hr><br>

<form action="front.php" method="post" accept-charset="utf-8">
	<input type="text" name="key" value="" placeholder="search">
	<input type="submit" name="search" value="search">
</form>

<br>

<?php
include("conn/config.php");

	if (!empty($_POST['key'])) {
		$key = $_POST['key'];	
	}

	if ($key==null) {
		$sql = "SELECT * FROM product ";
	} else {
		$sql = "SELECT * FROM product WHERE product_name LIKE '%".$key."%' ";
	}

	$query = mysql_query($sql);

	while ($row=mysql_fetch_array($query)) {
		$id = $row['product_id'];

	?>

	<table valign="top" class="fixed">
		<tr><td rowspan="6" width="300px"><img src="product/<?=$row['product_full_image'];?>"></td></tr>
		<tr><td width="400px">ชื่อสินค้า : <?=$row['product_name'];?></td></tr>
		<tr><td width="400px">รายละเอียด : <?=$row['product_desc'];?></td></tr>
		<tr><td width="400px">ราคา : <?=$row['product_price'];?> บาท</td></tr>
		<tr><td>
			<form action="cart.php?id=<?=$row['product_id'];?>" method="post" accept-charset="utf-8">
				<input type="text" name="q" size="1" value="1" placeholder="">
				<input type="submit" name="" value="add to cart">
			</form>
		<tr><tr><tr><td><br>
	</table>

	<? } ?>

</html>