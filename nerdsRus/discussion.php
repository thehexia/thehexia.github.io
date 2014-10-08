<?php
session_start();
?>
<html>
<head>
<title>
<?php
$type = $_GET["type"];
if($type == "thread_magic") {
	$title = "Magic: the Gathering Discussion";
}
else if($type == "thread_halo") {
	$title = "Halo Discussion";
}
else if($type == "thread_cod") {
	$title = "Call of Duty Discussion";
}
else if($type == "thread_starcraft") {
	$title = "Starcraft Discussion";
}
else if($type == "thread_dnd") {
	$title = "D&D Discussion";
}
else if($type == "thread_other") {
	$title = "Other Games Discussion";
}
else if($type == "thread_anime_manga") {
	$title = "Anime and Manga Discussion";
}
else if($type == "thread_television") {
	$title = "TV Discussion";
}
else if($type == "thread_trollbridge") {
	$title = "Under the Troll Bridge";
}
else if($type == "thread_movies") {
	$title = "Movies Discussion";
}
print $title;
?>
</title>

<link rel = "stylesheet" type = "text/css" href = "global.css" />

</head>
<body>
<a href = "index.php"><img src="http://i1268.photobucket.com/albums/jj562/ItzExia/70e91612.png" border="0" alt="Website Logo"height = "30%" width = "50%" id = "logo"></a>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<div id = "login">
<?php
if($_COOKIE['user'] == NULL)
{
	echo("Already a member? <br /> \n <a href = \"login.html\">Login Here</a> <br /> \n 

Not currently a member? Register free here. <br /> \n <a href = 

\"register.html\">Registration</a> \n <br />");
echo("<a href = \"search_form.php\">Search Our Forums!</a>");
}
else
{
	echo("Welcome " . $_COOKIE['user'] . "! <br />");
	echo("<a href = \"logout.php\">Logout?</a>");
	echo("<br />");
	echo("<a href = \"search_form.php\">Search Our Forums!</a>");
}
?>
</div>
 
<table name = "index">
<tr>
<th colspan = "2"><?php print $title ?> Index</th>
<th>
<input type = "button" value = "Create Thread" onclick = "window.location.href='create_thread_form.php?type=<?php print $type ?>'" />
</th>
</tr>
<tr><th>Title</th><th>Number of Posts</th><th>Original Post Date</th></tr>
<?php
$host = "db1.cs.uakron.edu";
$username = "hvn1";
$password = "chue3Pah";
$dbname = "DB_hvn1";

//connect to sql server
$link = mysql_connect($host, $username, $password);

//check if is_resource
if(is_resource($link)) {
	
	//connect to database
	if(mysql_select_db($dbname, $link) === true) {
		$query = "SELECT * FROM all_threads_index WHERE thread_disc_loc = \"".$type."\" order by last_post_date desc;";
	/*
		$query = "SELECT all_threads_index.thread_id_num, all_threads_index.thread_table_name, all_threads_index.thread_disc_loc, all_threads_index.author, all_threads_index.orig_date, all_threads_index.last_post_date, ".$type.".thread_id, ".$type.".title 
		FROM ".$type.", all_threads_index 
		WHERE all_threads_index.thread_disc_loc = \"".$type."\" 
		AND all_threads_index.thread_id_num = ".$type.".thread_id
		ORDER BY all_threads_index.last_post_date DESC;";
	*/
		$list_query = mysql_query($query);
		
		//get num of rows in magic discussion directory
		$num_rows = mysql_num_rows($list_query);
		$num_cols = mysql_num_fields($list_query);
		
		for($i = 0; $i < $num_rows; $i++) {
			$list = mysql_fetch_array($list_query);
			
			//get number of posts in each thread
			$query_2 = "SELECT * FROM ".$list['thread_table_name'];
			$list_query_2 = mysql_query($query_2);
			$num_posts = mysql_num_rows($list_query_2);
			
			print "<tr><td width = \"500\"><a href = \"read_thread.php?table_name=".$list['thread_table_name']."&location=".$type."\">".$list['title']."</a><br /> by ".$list['author']."</td><td>".$num_posts."</td><td>".$list['orig_date']."</td></tr>";
		}
	}
	else {
		die("Failed to connect to database");
	}
}
else {
	die("Failed to connect to server.Please try again.");
}
?>
</table>
</body>
</html>