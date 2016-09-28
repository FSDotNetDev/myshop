<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/body.css">
</head>
<body>

<br><hr><br><center><font size="20"><b>ออกจากระบบ</b></font></center><br><hr><br>

<?php
session_start();

$_SESSION['login_success'] = null; 
$_SESSION['user_id'] = null;

?>

<center>ขณะนี้คุณได้ออกจากระบบแล้ว</center>

</body>
</html>