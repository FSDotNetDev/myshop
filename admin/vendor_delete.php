<?php
include("../conn/config.php");

$id = $_GET["id"];
$sql = "DELETE FROM vendor WHERE vendor_id = '$id' ";

mysql_close($conn);
header("Location: vendor_list.php");
exit();

?>