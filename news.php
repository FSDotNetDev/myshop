<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/body.css">
</head>
<body>

<br><hr><br>

<center><font size="20"><b>ประกาศข่าวสาร</b></font></center>

<br><hr><br>

<?php
include("conn/config.php");

$sql="SELECT * FROM news ";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {	
	$id = $row['news_id']; ?>  
		<table valign="top" class="fixed">
			<tr><td rowspan="6" valign="top"><img src="news/<?=$row['news_full_image']?>" width="300" height="250"></td></tr>
			<tr><td width="400px"><font color="#a66666">หัวข่าว :</font><?=$row['news_name']?></td></tr>
			<tr><td width="400px"><font color="#a66666">รายละเอียด : </font><?=$row['content']?></td><tr>
		</table>
		<br><hr><br>
<? } ?>

</body>
</html>