<html>																															
<head>																																				
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
session_start();
include"config.php";
if(!empty($_POST["admin_name"]))
	{	$user=$_POST['admin_name'];
		$pass=$_POST['password'];
	}
else
	{	$user="";
		$pass="";
	}
if($user!=null) 
	{	$con4=mysql_connect($host,$username,$password);
if (!$con4)
	{	die('Could not connect: ' . mysql_error());		}
mysql_select_db($database, $con4); //$id=$_GET["id"];
$sql4="SELECT * from admin WHERE admin_name='".$user."' AND password='".$pass."'";
if (!mysql_query($sql4,$con4))
	{	die('Error: ' . mysql_error());	}
$result4 = mysql_query($sql4);
$row4 = mysql_fetch_array($result4);
if($row4['admin_name']==$user AND $row4['password']==$pass)
	{	echo "<b>ยินดีต้อนรับ Admin: ".$row4['admin_name']."<br>";
		$_SESSION['login_success']="success"; $_SESSION['admin_id']=$row4['admin_id'];
	}
else
	{	echo"<center><font color='white'>ชื่อหรือรหัสผ่านไม่ถูกต้อง</center>";		}	
mysql_close($con4); } //end if
if($_SESSION['login_success']=='success')
	{	$con2=mysql_connect($host,$username,$password);
if (!$con2)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con2);
mysql_query("SET NAMES UTF8");
$result2=mysql_query("SELECT  *  FROM  vendor");
$con3=mysql_connect($host,$username,$password);
if(!$con3)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con3);
$result3=mysql_query("SELECT  *  FROM  product_parent");
?>

<html>
<body>
<br><hr><br>
<table>
<form name="myForm" action="product_insert.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data">
<tr><td><b>ชื่อสินค้า:<td><input id="name" type="text"name="name"><font color="red">*</font>
<tr><td><b>รายละเอียดสินค้า:<td><textarea name="desc" id="desc" cols="30" rows="5"></textarea><font color="red">*</font>
<tr><td><b>ราคา:<td><input id="price" type="text" name="price"><font color="red">*</font>
<tr><td><b>น้ำหนัก:<td><input type="text" name="weight"><font color="red">*</font>
<tr><td><b>จำนวนสินค้าที่มีอยู่:<td><input type="text" name="available"><font color="red">*</font>
<tr><td><b>จำนวนสินค้าในมือ:<td><input type="text" name="on_hand"><font color="red">*</font>
<tr><td><b>รูปสินค้า:<td><input type="file" name="fileupload">
<tr><td><b>ผู้ขาย:<td><select name="vendor_id">	
<?php 
while($row2=mysql_fetch_array($result2))
	{?>
	<option value='<?=$row2['vendor_id']?>'><?=$row2['vendor_name']?></option>
	<?}?>
<tr><td><b>ประเภทสินค้า<td><select name='product_parent_id'>
<?php 
while($row3=mysql_fetch_array($result3))
	{?>
	<option value='<?=$row3['product_parent_id']?>'><?=$row3['name']?></option>
	<?}?>
<tr><td><td>
<tr><td><td><input type="submit" value="เพิ่มสินค้า"><input type="reset" value="ยกเลิก">
</form> 
</table> 
<br><hr><br>
</body>
</html>

<?php
$con=mysql_connect($host,$username,$password);
if(!$con)
	{	die('Coule not connect:'.mysql_error());	}
mysql_select_db($database,$con);
mysql_query("SET NAMES UTF8");
$sql ="SELECT * FROM product_parent INNER JOIN 
(vendor INNER JOIN product ON vendor.vendor_id=product.vendor_id)
ON product_parent.product_parent_id=product.product_parent_id;";
$result=mysql_query("SELECT * FROM product");
$result=mysql_query($sql);
echo"<table border='1'>
<tr>
<th>ชื่อสินค้า</th>
<th>รายละเอียดสินค้า</th>
<th>ราคา</th>
<th>น้ำหนัก</th>
<th>จำนวนสินค้าที่มีอยู๋</th>
<th>จำนวนสินค้าในมือ</th>
<th>รูปสินค้า</th>
<th>ผู้ขาย</th>
<th>ประเภทสินค้า</th>
<th></th>
</tr>";
while($row=mysql_fetch_array($result))
	{	$id=$row['product_id'];
		echo"<tr>";
		echo"<td>".$row['product_name']."</td>";
		echo"<td>".$row['product_desc']."</td>";
		echo"<td>".$row['product_price']."</td>";
		echo"<td>".$row['product_weight']."</td>";
		echo"<td>".$row['product_available']."</td>";
		echo"<td>".$row['product_on_hand']."</td>";
		echo"<td>".$row['product_full_image']."</td>";
		echo"<td>".$row['vendor_name']."</td>";
		echo"<td>".$row['name']."</td>";
		echo"<td><a href='product_edit.php?id=".$id."'>แก้ไข</a>"."</td>";
		echo"<td><a href='product_delete.php?id=".$id."' onclick='return chkConfirm();'>ลบ</a>"."</td>";
		echo"</tr>";
	}
	echo"</table>";
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
