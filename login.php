<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>

<br><hr><br><center><font size="20"><b>เข้าสู่ระบบ</b></font></center><br><hr><br>

<?php
session_start();

	if (empty($_SESSION["login_success"])) {
		$_SESSION["login_success"] = null;
	}
	if ($_SESSION['login_success'] == null) { ?>
		
		<form name="myForm" onSubmit="return validateForm()" action="2login.php" method="post">
			<table>			
				<tr><td>Username:</font><td><input type="text" name="username"><font color="red">*</font>
				<tr><td>Password:</font><td><input type="password" name="password"><font color="red">*</font>
				<tr><td><td><input type="submit" value="login"><input type="reset" value="reset">			
			</table>
		</form>

	<? } else { ?>
		<center>ขณะนี้คณได้เข้าสู่ระบบอยู่ต้องการออกจากระบบ <a href="logout.php">click</a></font></center>
	<? } ?>

<script language="JavaScript">
	function validateForm() {	
		var x=document.forms["myForm"]["username"].value;
		if (x==null || x=="") {	
			alert("กรุณากรอก username");
			return false;
		}
		var x=document.forms["myForm"]["password"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอก password");
			return false;
		}
	}
</script>
</body>
</html>