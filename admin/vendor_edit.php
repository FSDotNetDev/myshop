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

<?php
include("../conn/config.php");

$id = $_GET["id"];
$sql = "SELECT * FROM vendor WHERE vendor_id = " . $id;
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

?>

<table>
	<form name="myForm" action="vendor_save.php?id=<?=$id?>" onsubmit="return validateForm()" method="post">
		<tr><td><b>ชื่อบริษัท:<td><input type="text" name="vendor_name" value="<?=$row['vendor_name'];?>"><font color="red">*</font>
		<tr><td><b>ชื่อพนักงาน:<td><input type="text" name="contact_name" value="<?=$row['contact_name'];?>"><font color="red">*</font>
		<tr><td><b>ตำแหน่ง:<td><input type="text" name="contact_title" value="<?=$row['contact_title'];?>"><font color="red">*</font>
		<tr><td><b>ที่อยู่:<td><input type="text" name="address" value="<?=$row['address'];?>"><font color="red">*</font>
		<tr><td><b>เบอร์โทร:<td><input type="text" name="phone" value="<?=$row['phone'];?>"><font color="red">*</font>
		<tr><td><b>อีเมล์:<td><input type="text" name="email" value="<?=$row['email'];?>"><font color="red">*</font>
		<tr><td><td><input type="submit" value="บันทึก" ><input type="reset" value="ยกเลิก">
	</form>
</table>

<? mysql_close($con); ?>

<br><hr><br>

</body>
</html>

<script type="text/javascript">
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
			alert("กรุณากรอกเบอร์โทร");
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
</script>