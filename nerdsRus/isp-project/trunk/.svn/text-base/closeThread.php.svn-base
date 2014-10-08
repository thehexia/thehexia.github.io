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

if(!mysql_query("UPDATE all_threads_index SET isClosed='Y' WHERE thread_table_name=\"" . $_GET['thread'] . "\""))
{
	die("Couldn't close thread");
}
else
{
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
