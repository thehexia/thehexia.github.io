<html>
<head>
<title>Ban Cannon!</title>
<link rel = "stylesheet" type = "text/css" href = "global.css" />
<style type = "text/css">
#list {
position: fixed;
left: 40px;
top: 250px;
}
</style>

</head>
<body>

<h1>Ban Cannon!</h1>

<form action = "setBan.php" method = "post">

<div name = "cannon" id = "cannon">
<img src = "cannon.jpg" alt = "cannon picture" />
</div>
<div id = "list">
<select name = "user">
<option value = "">--User List--</option>
<?php

$host = "db1.cs.uakron.edu";
$username = "hvn1";
$password = "chue3Pah";
$dbname = "DB_hvn1";

$link = mysql_connect($host, $username, $password);

if(is_resource($link)) {
	
	if(mysql_select_db($dbname, $link) == true) {
		$query = "Select * from users where isBanned = \"N\";";
		$users = mysql_query($query);
		
		for($i = 0; $i < mysql_num_rows($users); $i++) {
			$userList = mysql_fetch_array($users);
			print "<option value = \"".$userList['id']."\" >".$userList['username']."</option>";
		}
	}
	else {
		die("Failed to connect to database");
	}
}
else{
	die("Failed to connect to database");
}


?>
</select>
<input type = "submit" value = "Ban Them!" />
</div>
</form>

<br />
<br />
<h1>Unban a User</h1>
<form action = "unban.php" method = "post">
<select name = "users">
<option value = "">--User List--</option>
<?php

$query = "Select * from users where isBanned = \"Y\";";
$users = mysql_query($query);

for($i = 0; $i < mysql_num_rows($users); $i++) {
	$userList = mysql_fetch_array($users);
	print "<option value = \"".$userList['id']."\" >".$userList['username']."</option>";
}

mysql_close($query);

?>
</select>
<input type = "submit" />
</form>
</body>
</html>