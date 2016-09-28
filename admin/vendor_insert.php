<?php
include("../conn/config.php");

$vendor_name = $_POST["vendor_name"];
$contact_name = $_POST["contact_name"];
$contact_title = $_POST["contact_title"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "INSERT INTO vendor (
			vendor_name,
			contact_name,
			contact_title,
			address,
			phone,
			email )
		VALUES (
			'$vendor_name',
			'$contact_name',
			'$contact_title',
			'$address',
			'$phone',
			'$email' ) ";

mysql_close($conn);
header("Location: vendor_list.php");

?>