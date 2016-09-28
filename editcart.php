<html>																															
<head>																																					
<link href="css/body.css" rel="stylesheet" type="text/css">
</head>

<?php
session_start();
Class MyStruct 
	{	public $id;
		public $q;
	}
$data=new MyStruct();
foreach($_SESSION["shoppingcart"] as & $data)
	{	$data->q=$_POST[$data->id];	}
header("Location: showcart.php");
?>
