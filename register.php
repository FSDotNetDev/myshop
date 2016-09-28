<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>
<body>

<br><hr><br>

<center><font size='20'><b>สมัครสมาชิก</b></font></center>

<br><hr><br>

<form name="myForm" onSubmit="return validateForm()" action="register_insert.php" method="post">
	<table>
		<tr><td>ชื่อผู้ใช้งาน<td><input id="username" type="text" name="username"><font color="red">*</font>
		<tr><td>รหัสผ่าน<td><input id="password" type="password" name="password"><font color="red">*</font>
		<tr><td>ยืนยันรหัสผ่าน<td><input id="confirmpassword" type="password" name="confirmpassword"><font color="red">*</font>
		<tr><td>ชื่อ<td><input id="firstname" type="text" name="firstname"><font color="red">*</font>
		<tr><td>นามสกุล<td><input id="lastname" type="text" name="lastname"><font color="red">*</font>
		<tr><td>ทีอยู่<td><textarea name="address" id="address" cols="30" rows="5"></textarea><font color="red">*</font>
		<tr><td>เบอร์โทร<td><input type="text" name="mobile"><font color="red">*</font>
		<tr><td>อีเมล์<td><input type="text" name="email"><font color="red">*</font>
		<tr><td><td><input type="submit" value="ลงทะเบียน"><input type="reset" value="ยกเลิก">
	</table>
</form>

<script language="JavaScript">
	function validateForm() {
		x=document.forms["myForm"]['username'].value;
		if (x==null || x=="") {
			alert("กรุณากรอกชื่อผู้ใช้งาน");				
			return false;
		}
        x=document.forms["myForm"]['password'].value;
		if (x==null || x=="") {
			alert("กรุณากรอกรหัสผ่าน");				
			return false;
		}
		x=document.forms["myForm"]['confirmpassword'].value;
		y=document.forms["myForm"]['password'].value;
		if (x!=y) {
			alert("กรุณากรอกยืนยันรหัสผ่าน");				
			return false;
		}  
		x=document.forms["myForm"]['firstname'].value;
		if (x==null || x=="") {
			alert("กรุณากรอกชื่อ");				
			return false;
		}
		x=document.forms["myForm"]['lastname'].value;
		if (x==null || x=="") {
			alert("กรุณากรอกนามสกุล");				
			return false;
		}
		x=document.forms["myForm"]['address'].value;
		if (x==null || x=="") {
			alert("กรุณากรอกที่อยู่");				
			return false;
		}
		x=document.forms["myForm"]['mobile'].value;
		if(x==null || x==""|| isNaN(x) || x<0) {
			alert("กรุณากรอกเบอร์โทรเป็นตัวเลข");				
			return false;
		}
		var x=document.forms["myForm"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("กรุณากรอกอีเมล์");
			return false;
		}
	}
</script>

</body>
</html>