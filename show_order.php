<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

<?php
include("conn/config.php");
session_start();

if (!empty($_POST["admin_name"])) {
	$user = $_POST['admin_name'];
	$pass = $_POST['password'];
} else {
	$user = "";
	$pass = "";
}

if ($user != null) {
	$sql_admin = "SELECT * FROM admin WHERE admin_name = '".$user."' AND password = '".$pass."' ";
	$query_admin = mysql_query($sql_admin);
	$row_admin = mysql_fetch_array($query_admin);

	if ($row_admin['admin_name'] == $user AND $row_admin['password'] == $pass) { ?>
		<b>ยินดีต้อนรับ Admin: <?=$row_admin['admin_name']?><b>
		<?
		$_SESSION['login_success'] = "success"; 
		$_SESSION['admin_id'] = $row_admin['admin_id'];
	} else { ?>
		<center>ชื่อหรือรหัสผ่านไม่ถูกต้อง</center>		
	<? }

	if ($_SESSION['login_success'] == 'success') {
		$sql_order = "SELECT * FROM p_order JOIN user ON p_order.user_id = user.user_id ";
		$query_order = mysql_query($sql_order);	
	} else {
		// $conn = '';
		mysql_close($conn);
	}
} ?>

<table border='1'>
	<tr>
		<th>รหัสคำสั่งซื้อ</th>
		<th>วันที่ซื้อ</th> 
		<th>ชื่อลูกค้า</th>
		<th></th>
	</tr>
	<? while ($row_order = mysql_fetch_array($query_order)) {
		$id = $row_order['order_no']; ?>
		<tr>
			<td><?=$row_order['order_no']?></td>
			<td><?=$row_order['orderdate']?></td> 
			<td><?=$row_order['username']?></td>
			<td><a href="show_order2.php?id=<?=$row_order['order_no']?>">แสดง</a></td>
		</tr>
	<? } ?>
</table>

<? } else { ?>
		
		<br><hr><br><center><font size="20"><b>เข้าสู่ระบบ</b></font></center><br><hr><br>		

		<form name="myForm2" onSubmit="return validateForm2()" action="new_list.php" method="post">
			<table>			
				<tr><td>Username:<td><input type="text" name="admin_name"><font color="red">*</font>
				<tr><td>Password:<td><input type="password" name="password"><font color="red">*</font>
				<tr><td><td><input type="submit" value="login"><input type="reset" value="reset">
			</table>
		</form>
	<? } ?> 
	
<script language="JavaScript">
	function validateForm2() {
		var x=document.forms["myForm2"]["admin_name"].value;
		if (x==null || x=="") {
			alert("กรุณากรอก username");
			return false;
		}
		var x=document.forms["myForm2"]["password"].value;
		if (x==null || x=="") {
			alert("กรุณากรอก password");
			return false;
		}
	}
</script>

</body>
</html>