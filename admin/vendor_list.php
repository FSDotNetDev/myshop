<?php
include("../conn/config.php");
session_start();

if (!empty($_POST['admin_name'])) {
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
		<b>ยินดีต้อนรับ Admin: <?=$row_admin['admin_name']?><br> <?
		$_SESSION['login_success'] = "success"; 
		$_SESSION['admin_id'] = $row_admin['admin_id'];
	} else { ?>
		<center><font color="white">ชื่อหรือรหัสผ่านไม่ถูกต้อง</center> <?		
	}	
	mysql_close($conn); 
}

if ($_SESSION['login_success'] == 'success') {
	$sql_vendor = "SELECT * FROM vendor ";
	$result = mysql_query($sql_vendor);
	mysql_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

<br><hr><br> 

<table>
	<form name="myForm" action="vendor_insert.php" onsubmit="return validateForm()" method="post">
		<tr><td><b>ชื่อบริษัท:<td><input type="text" name="vendor_name"><font color="red">*</font>
		<tr><td><b>ชื่อพนักงาน:<td><input type="text" name="contact_name"><font color="red">*</font>
		<tr><td><b>ตำแหน่ง:<td><input type="text" name="contact_title"><font color="red">*</font>
		<tr><td><b>ที่อยู่:<td><textarea name="address" id="address" cols="30" rows="5"></textarea><font color="red">*<font>
		<tr><td><b>เบอร์โทร:<td><input type="text" name="phone"><font color="red">*</font>
		<tr><td><b>อีเมล์:<td><input type="text" name="email"><font color="red">*</font>
		<tr><td><td><input type="submit" value="เพิ่ม"><input type="reset" value="ยกเลิก">
	</form> 
</table> 

<br><hr><br>

</body>
</html>

	<table border='1'>
		<tr>
			<th>ชื่อบริษัท</th>
			<th>ชื่อพนักงาน</th>
			<th>ตำแหน่ง</th>
			<th>ที่อยู่</th>
			<th>เบอร์โทร</th>
			<th>อีเมล์</th>
		</tr>
		<? while ($row = mysql_fetch_array($result)) {
			$id = $row['vendor_id']; ?>
			<tr>
				<td><?=$row['vendor_name']?></td>
				<td><?=$row['contact_name']?></td>
				<td><?=$row['contact_title']?></td>
				<td><?=$row['address']?></td>
				<td><?=$row['phone']?></td>
				<td><?=$row['email']?></td>
				<td><a href="vendor_edit.php?id=<?=$id?>">แก้ไข</a></td>
				<td><a href="vendor_delete.php?id=<?=$id?>" onclick="return chkConfirm();">ลบ</a></td>
			</tr>
		<? } ?>
 	</table> 
<? } else { ?>
	<br><hr><br><center><font size="20"><b>เข้าสู่ระบบ</b></font></center><br><hr><br>
	<table>
		<form name="myForm2" onSubmit="return validateForm2()" action='new_list.php' method='post'>
			<tr><td>Username:<td><input type='text' name='admin_name'><font color="red">*</font>
			<tr><td>Password:<td><input type='password' name='password'><font color="red">*</font>
			<tr><td><td><input type='submit' value='login'><input type='reset' value='reset'>
		</form>
	</table>
<? } ?> 

<script type="text/javascript">
	function chkConfirm() {	
		if (confirm('กรุณายืนยันการลบอีกครั้ง !!! ')) {
			return true;
		} else {
			return false;	
		}
	}	

	function validateForm() {
		var x=document.forms["myForm"]["vendor_name"].value;
		if (x==null || x=="") {
			alert("กรุณากรอกชื่อบริษัท");
			return false;
		}
		var x=document.forms["myForm"]["contact_name"].value;
		if (x==null || x=="") {
			alert("กรุณากรอกชื่อพนักงาน");
			return false;
		}
		var x=document.forms["myForm"]["contact_title"].value;
		if (x==null || x=="") {
			alert("กรุณากรอกตำแหน่ง");
			return false;
		}
		var x=document.forms["myForm"]["address"].value;
		if (x==null || x=="") {
			alert("กรุณากรอกที่อยู่");
			return false;
		}
		x= document.forms["myForm"]["phone"].value;
		if(x==null || x==""|| isNaN(x) || x<0) {
			alert("กรุณากรอกเบอร์โทรเป็นตัวเลข");
			return false;
		}
		var x=document.forms["myForm"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("กรุณากรอกชื่อ E-mail");
			return false;
		}
	}

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