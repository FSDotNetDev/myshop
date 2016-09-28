 <?php

$ip = "http://".$_SERVER['SERVER_NAME']."/";

	if ($ip == 'http://127.0.0.1/') {
		$host 	= "localhost";
		$user 	= "root";
		$pass 	= "1234";
		$db		= "myshop";			
	} else {
		$host 	= "localhost";
		$user 	= "jumbangd";
		$pass 	= "f2836l3935";
		$db		= "myshop";
	}

$conn = mysql_connect($host, $user, $pass); 
mysql_select_db($db, $conn);
mysql_query("SET NAMES UTF8");

	if (!$conn) {
	    die("Connection failed: ".mysql_error());
	} else {
		// echo "Connected successfully";		
	}

?>