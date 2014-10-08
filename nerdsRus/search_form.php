<html>
<head>
<title>Forum Search</title>
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
<h1>Search System</h1>
<form action = "search.php" method = "post">
Search For: <input type = "text/css" name = "search_string" value = "" /> <br />
From: 
<select name = "discussion_type">
<option value = "%%"></option>
<option value = "thread_halo">Halo</option>
<option value = "thread_cod">Call of Duty</option>
<option value = "thread_starcraft">Starcraft</option>
<option value = "thread_dnd">Dungeons and Dragons</option>
<option value = "thread_other">Others</option>
<option value = "thread_anime_manga">Anime/Manga</option>
<option value = "thread_movies">Movies</option>
<option value = "thread_television">TV Shows</option>
<option value = "thread_trollbridge">The Trollbridge</option>
</select>
<br />
By:
<select name = "by" >
<option value = "thread_table_name">Relevance</option>
<option value = "author">Author</option>
<option value = "title">Title</option>
</select>
<input type = "submit" value = "Search" />
</form> 
</body>
</html>