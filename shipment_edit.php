<html>
<head>
<meta http-equiv =Content-Type content = "text/html;charset=utf-8" >
</head>
<html>
<body> 
<br><hr><br>
<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
$id=$_GET["id"];
if(!$con)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$sql="SELECT * FROM shipment WHERE shipment_id=".$id;
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<table>
<form name="myForm" onSubmit="return validateForm()" action="shipment_save.php?id=<?=$id?>" method="post">
<tr><td><b>ชื่อการส่งสินค้า:<td><input type="text" name="shipment" value="<?=$row['shipment']?>"><font color="red">*</font>
<tr><td><b>รายละเอียด:<td><textarea name='detail' rows="10" cols="30"><?=$row['detail']?></textarea><font color="red">*</font>
<tr><td><td><input type="submit" value="บันทึก" ><input type ="reset" value="ยกเลิก">
</form>
</table>
<?php mysql_close($con); ?>
<br><hr><br>
</body>
</html>

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
</script>	
