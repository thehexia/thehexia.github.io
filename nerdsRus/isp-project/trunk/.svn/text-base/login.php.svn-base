<?php
$server = "db1.cs.uakron.edu";
$db_uname = "hvn1";
$db_pass = "chue3Pah";
$db_name = "DB_hvn1";
//Create a connection to the database
$con = mysql_connect($server, $db_uname, $db_pass);

//If mysql_connect returns false there was no connection made, kill the script
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

//Select the ISP database and make sure it exists, otherwise kill everything
if( !mysql_select_db($db_name, $con))
{
	die('Couldn\'t connect to database: ' . mysql_error());
}

//Store all the values
$username = $_POST['user_name'];
$password = $_POST['password'];

//Check to see if that user exists
$query = "SELECT * FROM users WHERE username='";
$query = $query . $username . "'";

$result = mysql_query($query);

$row = mysql_fetch_array($result);
if($row['username'] != $username)
{
	die("The username entered does not exists. Please go back and try again.");
}

if($row['password'] != $password)
{
	die("The password entered does not match the username entered. Please go back and try again.");
}

//set username cookie
setcookie(user, $username);

mysql_close($con);
header("Location:./index.php");
?>