<html>																															
<head>																																					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>
<br><hr><br>

<?php
session_start();
include"config.php";
if(!empty($_POST["username"]))
	{	$user=$_POST['username'];
		$pass=$_POST['password'];
	}
else
	{	$user="";
		$pass="";
	}
if($user!=null) 
	{ 	$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect : ' . mysql_error());		}
mysql_select_db($database, $con);	//$id=$_GET["id"];
$sql="SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'";
if (!mysql_query($sql,$con))
	{	die('Error : ' . mysql_error());	}
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if($row['username']==$user AND $row['password']==$pass)
	{	echo"ยินดีต้อนรับคุณ ".$row['username']."<br><br>";
		$_SESSION['login_success']="success"; $_SESSION['user_id']=$row['user_id'];
	}
else
	{	echo"<center>ชื่อหรือรหัสผ่านไม่ถูกต้อง</center>";		}	
mysql_close($con); }	//end if
if($_SESSION['login_success']=='success')
	{	$con2=mysql_connect($host,$username,$password);
if (!$con2)
	{	die('Could not connect : '.mysql_error());		}
mysql_select_db($database, $con2);
$sql2="SELECT * FROM shipment"; 
$result2=mysql_query($sql2); 
$con3=mysql_connect($host,$username,$password);
if (!$con3)
	{	die('Could not connect : '.mysql_error());		}
mysql_select_db($database, $con3); 
mysql_query("SET NAMES UTF8"); 
$uid=$_SESSION['user_id'];
$sql3="SELECT * FROM user WHERE user_id ='$uid'"; 
$result3=mysql_query($sql3); 
$row3=mysql_fetch_array($result3); 
echo"โปรดเลือกวิธีการขนส่ง<br><br><form action='order2.php' method='post'><select name='shipment'>"; 
while($row2=mysql_fetch_array($result2)) 
	{	?>
		<option value='<?=$row2['shipment']?>'><?=$row2['shipment']?></option>
	<? }
echo"</select>";
echo"<br><br>โปรดตรวจสอบที่อยู่สำหรับจัดส่งสามารถแก้ไขก่อนทำรายการถัดไป<br><br><textarea name='address' cols='30'rows='10'>".$row3['address']."\n".$row3['province']."\n".$row3['postcode']."\n".$row3['mobile']."\n".$row3['email']."</textarea>";
echo"<br><br><input type='submit' value='ขั้นตอนต่อไป'> </form>";
}
else
	{	echo"<center><font size='20'><b>เข้าสู่ระบบ</b></font></center><br><hr><br>";		
?> 
<table>
<form name="myForm" onSubmit="return validateForm()" action='order1.php' method='post'>
<tr><td>Username:</font><td><input type='text' name='username'><font color="red">*</font><br>
<tr><td>Password:</font><td><input type='password' name='password'><font color="red">*</font><br>
<tr><td><td><input type='submit' value='login'><input type='reset' value='reset'>
</form>
</table>
<?}?>

<script language="JavaScript">
function validateForm()
	{	var x=document.forms["myForm"]["username"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอก username");
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

