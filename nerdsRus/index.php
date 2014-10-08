<html>
<head>
<title>Welcome to Nerds R Us</title>
<style type = "text/css">


#makeAcct {
	font-size:8pt;
	
}

</style>
<link rel = "stylesheet" type = "text/css" href = "global.css" />
</head>
<body>

<a href = ""><img src="http://i1268.photobucket.com/albums/jj562/ItzExia/70e91612.png" border="0" alt="Website Logo"height = "30%" width = "50%" id = "logo"></a>
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

$host = "db1.cs.uakron.edu";
$username = "hvn1";
$password = "chue3Pah";
$dbname = "DB_hvn1";

$link = mysql_connect($host, $username, $password);

if(is_resource($link)) {

	if(mysql_select_db($dbname, $link) == true) {
		$query = "SELECT * FROM users where username = \"".$_COOKIE['user']."\"";
		$list = mysql_query($query);
		$isMod = mysql_fetch_array($list);
		
		if($isMod['isMod'] == "Y") {
			echo("<br /><a href = \"bancannon.php\">Banning Tool</a>");
		}
		mysql_close($link);

	}
	else {
		die("Failed to retrieve data.");
	}
}
else {
	die("Failed to connect to server.");
}

?>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<table width = "700" class = "tables">
<tr><th>Welcome!</th></tr>
<tr><td>You have entered the Nerds R Us Message Boards Home Page. This is a website for nerds across the internet to congregate and discuss various topics as well as post images. Our boards range from card games to video games, movies to anime, and other random stuff! You do not have to be a member to explore our boards, but to post, you must fill out a quick and easy <a href="register.html">form</a>. If you're a nerd, you're welcome to be here. We hope you enjoy jthe site.</td>
</tr>
</table>

<table width = "700" class = "tables" border = "1" style = "border-style: solid;">
<tr><th colspan = "3">Our Message Boards</td></tr>
<tr>
<td>
<strong>Games</strong><br />
<a href="discussion.php?type=thread_halo"> Halo Discussion </a> <br />
<a href="discussion.php?type=thread_cod"> Call of Duty Discussion </a> <br />
<a href="discussion.php?type=thread_starcraft"> Starcraft Discussion </a> <br />
<a href="discussion.php?type=thread_magic"> Magic: the Gathering Discussion </a> <br />
<a href="discussion.php?type=thread_dnd"> Dungeons and Dragons Discussion </a> <br />
<a href="discussion.php?type=thread_other"> Others Discussion </a>
</td>
<td>
<strong>Shows</strong> <br />
<a href="discussion.php?type=thread_anime_manga"> Anime/Manga Discussion </a> <br />
<a href="discussion.php?type=thread_movies"> Movies Discussion </a> <br />
<a href="discussion.php?type=thread_television"> TV Show Discussion </a> 
</td>
<td>
<strong> Random! </strong> <br />
<a href="discussion.php? type=thread_trollbridge"> The Troll Bridge <br />(where anything and everything may be discussed) </a>
</td>
</tr>
<tr><th colspan = "3" > FAQ and Rules </th></tr>
<tr><td colspan= "3" ><a href = "faq.php">F.A.Q.</a> <br /> <a href = "5commands.php">Rules - 5 Commands of Nerds R Us</a></tr>
</table>


</body>
</html>