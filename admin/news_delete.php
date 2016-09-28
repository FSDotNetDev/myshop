<?php
include"config.php";

$id = $_GET["id"];
$sql = "DELETE FROM news WHERE news_id = '$id' ";

mysql_close($conn);
header("Location: news_list.php");
exit();

?>