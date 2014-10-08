<?php

$userID = $_POST['user'];

$host = "db1.cs.uakron.edu";
$username = "hvn1";
$password = "chue3Pah";
$dbname = "DB_hvn1";

$link = mysql_connect($host, $username, $password);

if(is_resource($link)) {

	if(mysql_select_db($dbname, $link) == true) {
		$query = "UPDATE users SET isBanned = \"Y\" WHERE id = ".$userID.";";
		$list = mysql_query($query);
		
		mysql_close($link);
		header("Location: ./bancannon.php");
	
	}
	else {
		die("Failed to retrieve data.");
	}
}
else {
	die("Failed to connect to server.");
}

?>