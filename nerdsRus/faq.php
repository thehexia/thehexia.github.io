<html>
<head>
<title>FAQ - How do I be a good nerd?</title>
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
<h2>What is this website?</h2>
<p>
Well that's a very simple answer. This website is a place for nerds to come talk about all the favorite things that nerds love. Video games (duh), anime, manga, movies (yeah, for you Trekkies out there), etc. You can post threads about any topic you want and other members will freely be allowed to ahve discussiona bout them with you. 
</p>

<h2>Do I have to be a nerd for this website?</h2>
<p>
Of course you do! Just kidding, you can be anyone who enjoys anything on this website.
</p>

<h2>How do I post/reply to threads on this website?</h2>
<p>
Posting on this website has been made very simple for you, the user. First, simply click on any of the main discussion boards listed on our home page. Once you do that, you will be directed to an index of all threads currently active within the discussion board. Threads are listed in order of last post date. Therefore, the most relevant threads appear at the very top of the page. Next, you can either click one of the threads to view it or click "Create Thread" at the top of the table. <strong>Remember, you must first be a registered user to post or reply to threads.</strong> 
</p>

<h2>How do I become a member?</h2>
<p>
Becoming a member is both easy and free! At the top of every page there is a link to both login and a registration page. To register one must simply provide there first name, a unique username, and a password. You may also provide an email but that is optional and will not be exploited by us to spam you with advertisements.
</p>

<h2>Can I post HTML within my posts?</h2>
<p>
Absolutely! Our forum fully supports the use of HTML tags. This includes hyperlinks, styles, images, etc. However, remember that all posts will be monitored and any posts containing illegal content willb e censored. We do not condone such behaviour so be good little nerds.
</p>

<h2>I tried to log on and I received a notification saying that I am banned. What do I do?</h2>
<p>
If you received that notification then that means you have been naughty. We do not have many rules on this forum and thus by violating them you have earned yourself an indefinite ban.
</p>

</body>
</html>