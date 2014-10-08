<?php
session_start();
?>
<html>
<head>
<title>
<?php
function userRank($posts)
{
	if($posts['isMod'] == "Y")
	{
		print "Rank: <font color=\"00FF00\">Moderator</font>";
		return;
	}
	elseif($posts['posts'] <= 49)
	{
		print "Rank: <font color=\"red\">Noob</font>";
		return;
	}
	elseif($posts['posts'] <= 199)
	{
		print "Rank: <font color=\"orange\">Scrub</font>";
		return;
	}
	elseif($posts['posts'] <= 299)
	{
		print "Rank: <font color=\"blue\">Pro Poster</font>";
		return;
	}
	else
	{
		print "Rank: <font color=\"yellow\">Legendary Troll</font>";
		return;
	}
}

$table_name = $_GET['table_name'];
$disc_loc = $_GET['location'];

//connect to database
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
		$title_query = "SELECT * FROM all_threads_index WHERE thread_table_name=\"".$table_name."\";";
		$title_search = mysql_query($title_query);
		$title = mysql_fetch_array($title_search);
		print "Nerds \"R\" Us - ".$title["title"];
	}
	else {
		die("Failed to get data from server");
	}
}
else {
	die("Failed to connect to server");
}
?>
</title>
<link rel = "stylesheet" type = "text/css" href = "global.css" />
</head>
<body>
<a href = "index.php"><img src="http://i1268.photobucket.com/albums/jj562/ItzExia/70e91612.png" border="0" alt="Website Logo"height = "30%" width = "50%" id = "logo"></a>
<div id = "login">
<?php
if($_COOKIE['user'] == NULL)
{
	echo("Already a member? <br /> \n <a href = \"login.html\">Login Here</a> <br /> \n Not currently a member? Register free here. <br /> \n <a href = \"register.html\">Registration</a> \n <br />");
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
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php
if(mysql_select_db($dbname, $link) === true) {
	$post_query = "SELECT * FROM ".$table_name;
	$posts = mysql_query($post_query);
	
	if($posts) {
		
	}
	else {
		print "An error has occured in your post to the server. Please try again.";
		die("System failed.");
	}
	
	print "<table>";
	$threadTitle = htmlspecialchars_decode($title["title"]);
	print "<tr>";
	print "<th><a href=\"discussion.php?type=".$disc_loc."\">Back to Discussion</a>";
	print "<th>".$threadTitle."</th>";
	
	if($title['isClosed'] == 'Y')
	{
		print("<th>Thread Closed</th></tr>");
	}
	else
	{
		print("<th><input type = \"button\" value = \"Reply\" onclick = \"window.location.href='reply.php?type=" . $table_name . "&loc=" . $disc_loc . "'\"/></th></tr>");
	}

	for($i = 0; $i < mysql_num_rows($posts); $i++) {
		$post_list = mysql_fetch_array($posts);
		$content = $post_list["post_content"];
		
		$query_posts = "select * from users where username = \"".$post_list["author"]."\";";
		$total_posts = mysql_query($query_posts);
		
		$post = mysql_fetch_array($total_posts);
		
		print "<tr><th colspan = \"3\"><br /></th></tr>"; 
		print "<tr><td width = \"20%\">".$post_list["author"]." <br /> Total Posts: ".$post["posts"] . "<br />";
		userRank($post);
		print "</td><td class = \"content\"><p>";
		echo htmlspecialchars_decode($content);
		print "</p><br /></td><td width = \"10%\"></td></tr>";
	}
	$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username=\"" . $_COOKIE['user'] . "\""));
	if($user['isMod'] == 'Y' && $title['isClosed'] == 'N')
	{
		print("<tr><td width = \"20%\">");
		print("<input type=\"button\" value=\"Close Thread\" onclick=\"window.location.href='closeThread.php?thread=" . $table_name . "'\" />");
		print("</td></tr>");
	}
	print "</table>";
}
?>
</body>
</html>