<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
$sql="SELECT * FROM product_parent WHERE product_parent_id=".$id;
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>

<table>
<form name="myForm" action="product_parent_save.php?id=<?=$id?>" onsubmit="return validateForm()" method="post">
<tr><td><b>ชื่อประเภทสินค้า:<td><input type="text" name="name" value="<?=$row['name']?>"><font color="red">*</font>
<tr><td><td><input type ="submit" value="บันทึก" ><input type ="reset" value="ยกเลิก">
</form>
</table>
<?php mysql_close($con); ?>
<br><hr><br>
</body>
</html>


<script language="JavaScript">
function validateForm()
	{	var x=document.forms["myForm"]["name"].value;
		if (x==null || x=="")
		{	alert("กรุณากรอกชื่อประเภทสินค้า");
			return false;
		}
	}
</script >	
