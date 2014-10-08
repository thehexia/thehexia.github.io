<html>
<head>
<title>The Rules - The 5 Commands of Nerds R Us</title>
<link rel = "stylesheet" type = "text/css" href = "global.css" />
</head>
<body>
<a href = "index.php"><img src="http://i1268.photobucket.com/albums/jj562/ItzExia/70e91612.png" border="0" alt="Website Logo"height = "30%" width = "50%" id = "logo"></a>
<div id = "login">
<?php
if($_COOKIE['user'] == NULL)
{
	echo("Already a member? <br /> \n <a href = \"login.html\">Login Here</a> <br /> \n Not currently a member? Register free here. <br /> \n <a href = \"register.html\">Registration</a> \n </div> <br />");
}
else
{
	echo("Welcome " . $_COOKIE['user'] . "! <br />");
	echo("<a href = \"logout.php\">Logout?</a>");
	echo("</div> <br />");
}
?>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<p>When posting on Nerds R Us one must follow the following 5 rules. On this forum we are very lax on content but the following behaviour shall not be allowed and will incur punishment if caught.</p>
<ol>
<li>Nerds shall not commit misdemeanor or felony harassment upon thy fellow nerds without permission from thy mothers.</li>
<li>Nerds shall not post content that is illegal within the United States of America upon these grounds.</li>
<li>Nerds shall not troll outside of the Troll Bridge.</li>
<li>Nerds shall not solicit objects or actions, legal or illegal, from thine fellow nerds.</li>
<li>Nerds shall not make rule 34 of the internet true upon this forum lest they be sent flying from the ban cannon.</li>
</ol>
</body>
</html>