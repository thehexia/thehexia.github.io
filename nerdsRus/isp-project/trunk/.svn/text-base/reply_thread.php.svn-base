<?
session_start();

$thread_name = $_GET['thread'];

$location = $_GET['loc'];

$content = str_replace("<script","< script",$_POST['post_content']);
$content = str_replace("<?php","< ?php",$content);
$content = htmlspecialchars($content);

if($_COOKIE['user'] != null){
	$author = $_COOKIE['user'];
}
else {
	$author = "unknown";
}

$today = date("F j, Y, g:i a"); //current date

$host = "db1.cs.uakron.edu";
$username = "hvn1";
$password = "chue3Pah";
$dbname = "DB_hvn1";

$link = mysql_connect($host, $username, $password);

if(is_resource($link)) {
	if(mysql_select_db($dbname, $link) == true) {
		
		//insert reply into thread table
		$query = "INSERT INTO ".$thread_name." values (\"".$author."\", \"".$today."\", \"".$content."\");" ;
		$post = mysql_query($query);
		
		//update last post date in all_thread_index
		
		$date = date("Y:m:d-G:i:s");
		$query = "update all_threads_index set last_post_date = \"".$date."\" where thread_table_name = \"".$thread_name."\";";
		$update = mysql_query($query);
		
		//If everything went as planned, then we can add 1 to the user posts number
		$user_row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='" . $_COOKIE['user'] . "'"));
		$user_posts_count = $user_row['posts'] + 1;
		$user_query = "UPDATE users SET posts=" . $user_posts_count . " WHERE username='" . $_COOKIE['user'] . "'";
		mysql_query($user_query);
		
		//close database
		mysql_close($link);
		
		//redirect to thread
		$redirect = "Location: ./read_thread.php?table_name=".$thread_name."&location=".$location;
		header($redirect);
	}
	else {
		die("failed to retrieve data from database. Please try again.");
	}
}
else {
	die("Failed to connect to server. Please try again.");
}
?>
<html>
</html>