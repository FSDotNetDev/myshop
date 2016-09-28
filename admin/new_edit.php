<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

<br><hr><br>

<?php
include("../conn/config.php");

$id = $_GET["id"];
$sql = "SELECT * FROM news WHERE news_id = " . $id;
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

?>

<table>
	<form name="myForm" onSubmit="return validateForm()" action="news_save.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
		<tr><td><b>หัวข่าว:<td><input type="text" name="news_name" value="<?=$row['news_name']?>"><font color="red">*</font>
		<tr><td><b>รายละเอียด:<td><textarea name="content" rows="10" cols="30"><?=$row['content']?></textarea><font color="red">*</font>
		<tr><td><b>รูปสินค้า:<td><input type="file" name="fileupload" value="<?=$row['news_full_image'];?>">
		<tr><td><td><br><input type="submit" value="บันทึก" ><input type ="reset" value="ยกเลิก">
	</form>
</table>

<br><hr><br>

<?php mysql_close($conn); ?>
	
<script language="JavaScript">
	function validateForm() {
		var x=document.forms["myForm"]["news_name"].value;
		if (x==null || x=="") {
			alert("กรุณากรอกชื่อเรื่อง");
			return false;
		}
		var x=document.forms["myForm"]["content"].value;
		if (x==null || x=="") {
			alert("กรุณากรอกรายละเอียดข่าว");
			return false;
		}
	}
</script>	

</body>
</html>