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
$first_name = $_POST["first_name"];
$user_name = $_POST["user_name"];
$password = $_POST["password"];
$location = $_POST["local"];
$email = $_POST["email"];
$about = $_POST["about"];
$userID = 0;

//Get all the rows from the users table
$query = "SELECT * FROM users";
$result = mysql_query($query);

//Make sure we got results
if(!$result)
{
	//If not die
	die("Couldn't select users table o.O");
}

//Determine the current userID using the number of current users
while($row = mysql_fetch_array($result))
{
	if($row['username'] == $user_name)
	{
		die("The username entered already exists. Please go back and try again.");
	}
	$userID++;
}

//Create a query to add user
$query = "INSERT INTO users VALUES(" . $userID . ",\"";
$query = $query . $first_name . "\", \"";
$query = $query . $user_name . "\", \"";
$query = $query . $password . "\", \"";
$query = $query . $location . "\", \"";
$query = $query . $email . "\", \"";
$query = $query . $about . "\", 0, \"N\", \"N\")";

//Store the values in the SQL database
if(!mysql_query($query))
{
	die("Couldn't add the user");
}
else
{
	//Kill our connection and redirect to main page
	mysql_close($con);
	header("Location:./index.php");
}
?>
