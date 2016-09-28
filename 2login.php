<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>

<br><hr><br>

<?php
include("conn/config.php");
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '".$user."' AND password = '".$pass."' ";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

if ($row['username'] == $user AND $row['password'] == $pass) { ?>
	<center><font size="20"><b>Wellcome</b></font></center><br><hr><br>
	<center>ยินดีต้อนรับคุณ
	<?=
	$row['username'];
	$_SESSION['login_success'] = "success";
	$_SESSION['user_id'] = $row['user_id'];
} else { ?>
	<center><font size="20" color="white"><b>ท่านไม่สามารเข้าสู่ระบบได้</b></font></center><br><hr><br>
	<center><font color="white">ชื่อหรือรหัสผ่านไม่ถูกต้อง เข้าสู่ระบบใหม่ <a href="login.php"><font color="white">click</font></font></center>
<? } mysql_close($conn); ?>

</body>
</html>