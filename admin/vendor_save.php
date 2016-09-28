<?php
include("../conn/config.php");

$id = $_GET["id"];
$vendor_name = $_POST["vendor_name"];
$contact_name = $_POST["contact_name"];
$contact_title = $_POST["contact_title"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$sql = "UPDATE vendor 
		SET 
			vendor_name = '$vendor_name',
			contact_name = '$contact_name',
			contact_title = '$contact_title',
			address = '$address',
			phone = '$phone',
			email = '$email' 
		WHERE vendor_id='$id' ";

mysql_close($conn);
header("Location: vendor_list.php");
exit();

?>