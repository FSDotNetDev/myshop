<?php
session_start();
include"config.php";
if(!empty($_POST["admin_name"]))
	{	$user = $_POST['admin_name'];
		$pass = $_POST['password'];
	}
else
	{	$user="";
		$pass="";
	}
if($user!=null) 
	{	$con4 = mysql_connect($host,$username,$password);
if (!$con4)
	{	die('Could not connect: ' . mysql_error());		}
mysql_select_db($database, $con4);	//$id=$_GET["id"];
$sql4="SELECT * from admin WHERE admin_name='".$user."' AND password='".$pass."'";
if (!mysql_query($sql4,$con4))
	{	die('Error: ' . mysql_error());	}
$result4=mysql_query($sql4);
$row4=mysql_fetch_array($result4);
if($row4['admin_name']==$user AND $row4['password']==$pass)
	{	echo "<b>ยินดีต้อนรับ Admin: ".$row4['admin_name']."<br>";
		$_SESSION['login_success']="success"; $_SESSION['admin_id']=$row4['admin_id'];
	}
else
	{	echo"<center><font color='white'>ชื่อหรือรหัสผ่านไม่ถูกต้อง</center>";		}	
mysql_close($con4); } //end if
if($_SESSION['login_success']=='success')
	{	$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$result=mysql_query("SELECT  *  FROM  shipment");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<html><body><br><hr><br><table>
<form name="myForm" onSubmit="return validateForm()" action="shipment_insert.php" method="post">
<tr><td><b>ชื่อการส่งสินค้า<td><input type="text"name="shipment"><font color="red">*</font>
<tr><td><b>รายละเอียด<td><textarea name='detail' cols='30' rows='10'></textarea><font color="red">*</font>
<tr><td><td><input type="submit" value="เพิ่ม"><input type="reset" value="ยกเลิก">
</form></table><br><hr><br>
</body></html>

<?php
echo"<table border='1'>	
<tr>
<th>การส่งสินค้า</th>
<th>รายละเอียด</th>
</tr>";
while($row=mysql_fetch_array($result))
	{	$id=$row['shipment_id'];
		echo"<tr>";
		echo"<td>".$row['shipment']."</td>"; 
		echo"<td>".$row['detail']."</td>";
		echo"<td><a href='shipment_edit.php?id=".$id."'>แก้ไข</a>"."</td>";
		echo"<td><a href='shipment_delete.php?id=".$id."' onclick='return chkConfirm();'>ลบ</a>"."</td>";
		echo"</tr>";
	}
echo"</table>";
mysql_close($con);
}
else
	{	echo"<br><hr><br><center><font size='20'><b>เข้าสู่ระบบ</b></font></center><br><hr><br>";		
		?> 
<table>
<form name="myForm2" onSubmit="return validateForm2()" action='new_list.php' method='post'>
<tr><td>Username:<td><input type='text' name='admin_name'><font color="red">*</font>
<tr><td>Password:<td><input type='password' name='password'><font color="red">*</font>
<tr><td><td><input type='submit' value='login'><input type='reset' value='reset'>
</form>
</table>
	<?}?> 
	
<script language="JavaScript">
function validateForm()
	{	var x=document.forms["myForm"]["shipment"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอกชื่อการส่งสินค้า");
			return false;
		}
		var x=document.forms["myForm"]["detail"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอกรายละเอียด");
			return false;
		}
	}
function chkConfirm()
	{	if(confirm('กรุณายืนยันการลบอีกครั้ง !!! '))
		{	return true;		}
		else
		{	return false;	}
	}
function validateForm2()
	{	var x=document.forms["myForm2"]["admin_name"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอก username");
			return false;
		}
		var x=document.forms["myForm2"]["password"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอก password");
			return false;
		}
	}
</script>	






	
	
	
