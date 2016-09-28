<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
</html>
<body>
<br><hr><br>
<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
$id=$_GET["id"];
if (!$con)
	{	die('Could not connect : '. mysql_error());		}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$sql="SELECT * FROM product WHERE product_id=".$id;
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$con2=mysql_connect($host,$username,$password);
if(!$con2)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con2);
$result2=mysql_query("SELECT  *  FROM  vendor");
$con3=mysql_connect($host,$username,$password);
if(!$con3)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con3);
$result3=mysql_query("SELECT  *  FROM  product_parent");
?>
<table>
<form name="myForm" action="product.save.php?id=<?=$id?>" onSubmit="return validateForm()" method="post" enctype="multipart/form-data">
<tr><td><b>ชื่อสินค้า:<td><input type="text" name="name" value="<?php echo $row['product_name'];?>"><font color="red">*</font>
<tr><td><b>รายละเอียดสินค้า:<td><input type="text" name="desc" value = "<?php echo $row['product_desc'];?>"><font color="red">*</font>
<tr><td><b>ราคา:<td><input type ="text" name="price" value="<?php  echo $row['product_price'];?>"><font color="red">*</font>
<tr><td><b>น้ำหนัก:<td><input type ="text" name="weight" value="<?php  echo $row['product_weight'];?>"><font color="red">*</font>
<tr><td><b>จำนวนสินค้าที่มีอยู่:<td><input type ="text" name="available" value="<?php  echo $row['product_available'];?>"><font color="red">*</font>
<tr><td><b>จำนวนสินค้าในมือ:<td><input type="text" name="on_hand" value="<?php  echo $row['product_on_hand'];?>"><font color="red">*</font>
<tr><td><b>รูปสินค้า:<td><input type="file" name="fileupload" value="<?php  echo $row['product_full_image'];?>">
<tr><td><b>ผู้ขาย:<td><select name='vendor_id'>
<?php 
while($row2=mysql_fetch_array($result2))
	{?>
	<option value='<?=$row2['vendor_id']?>'<?if($row['vendor_id']==$row2['vendor_id'])echo "selected";?>><?=$row2['vendor_name']?></option>
	<?}?>
<tr><td>ประเภทสินค้า<td><select name='product_parent_id'>
<?php 
while($row3=mysql_fetch_array($result3))
	{?>
	<option value='<?=$row3['product_parent_id']?>'<?if($row['product_parent_id']==$row3['product_parent_id'])echo "selected";?>><?=$row3['name']?></option>
	<?}?>
<tr><td><td>
<tr><td><td><input type ="submit" value="บันทึก" ><input type="reset" value="ยกเลิก">
</form>
</table>
<?php mysql_close($con); ?>
<br><hr><br>
</body>
</html>

<script language="JavaScript">
function chkConfirm()
	{	if(confirm('กรุณายืนยันการลบอีกครั้ง !!! '))
		{	return true;	}
		else
		{	return false;	}
	}
function validateForm()
	{	var x=document.forms["myForm"]["name"].value;
		if (x==null || x=="")
			{	alert("กรุณากรอกชื่อสินค้า");
				return false;
			}
		var x=document.forms["myForm"]["desc"].value;
		if (x==null || x=="")
			{	alert("กรุณากรอกรายละเอียดสินค้า");
				return false;
			}
		var x= document.forms["myForm"]["price"].value;
		if(x==null || x==""|| isNaN(x) || x<0)
			{	alert("กรุณากรอกราคาเป็นตัวเลข");
				return false;
			}
		var x=document.forms["myForm"]["weight"].value;
		if(x==null || x==""|| isNaN(x) || x<0)
			{	alert("กรุณากรอกน้ำหนักเป็นตัวเลข");
				return false;
			}
		var x=document.forms["myForm"]["available"].value;
		if(x==null || x==""|| isNaN(x) || x<0)
			{	alert("กรุณากรอกจำนวนสินค้าที่มีอยู่เป็นตัวเลข");
				return false;
			}
		var x=document.forms["myForm"]["on_hand"].value;
		if(x==null || x==""|| isNaN(x) || x<0)
			{	alert("กรุณากรอกจำนวนสินค้าในมือเป็นตัวเลข");
				return false;
			}		
	}
</script>


