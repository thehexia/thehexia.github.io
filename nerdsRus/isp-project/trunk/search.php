<html>
<head>
<title>Search Results</title>
<link rel = "stylesheet" type = "text/css" href = "global.css" />
</head>
<body>
<a href = "index.php"><img src="http://i1268.photobucket.com/albums/jj562/ItzExia/70e91612.png" border="0" alt="Website Logo"height = "30%" width = "50%" id = "logo"></a>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

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
<?php
$search_string = $_POST['search_string'];
$discussion_type = $_POST['discussion_type'];
$criteria = $_POST['by'];

$host = "db1.cs.uakron.edu";
$username = "hvn1";
$password = "chue3Pah";
$dbname = "DB_hvn1";

$link = mysql_connect($host, $username, $password);
if(is_resource($link)) {
	if(mysql_select_db($dbname, $link) == true) {
		$search_query = "SELECT * FROM all_threads_index WHERE thread_disc_loc like \"".$discussion_type."\" and ".$criteria." like \"%".$search_string."%\"";
		$search = mysql_query($search_query);
		if($search) {
		
			print "<h1>Your Results</h1>";
			print "<ol>";
			for($i = 0; $i < mysql_num_rows($search); $i++) {
				$list = mysql_fetch_array($search);
				print "<li><a href = \"read_thread.php?table_name=".$list['thread_table_name']."&location=".$list['thread_disc_loc']."\">".$list['title']."</a></li>";
			}
			print "</ol>";
	
		}
		else {
			die("Search failed for some reason. Please try again.");
		}
	}
	else {
		die("failed to retrieve data from database");
	}
}
else {
	die("Failed to connect to database");
}
?>
</body>
</html>