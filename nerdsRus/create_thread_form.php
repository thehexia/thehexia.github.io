<?php 
session_start(); 
?>
<html>
<head>
<title>Create Thread Form</title>
<script type = "text/javascript">
function checkForm() {
var title = document.getElementById('thread_title').value;
var content = document.getElementById('page_content').value;

//get rid of whitespaces
title = title.replace(/ /g,'');
content = content.replace(/ /g,'');

if(title == "") {
	alert("You have no title");
	return false;
}
if(content == "") {
	alert("You have no content in your post");
	return false;
}
if(content != "" && title != "") {
	return true;
}

}
</script>
</head>
<body>
<?php
$_SESSION['post_location'] = $_GET['type'];
?>

<?php
if($_COOKIE['user'] != NULL) {
print "<form action = \"create_thread.php\" method = \"post\" onsubmit=\"return checkForm()\">
<fieldset>
<legend>Create Thread</legend>
Special Characters : <br />
Hyperlinks: &lt;a href &#61; &quot;www.somewhere.com&quot; &gt; Some text here &lt;&#47;a&gt; <br />
Images: &lt;img src &#61; &quot;www.yourimagelocation.com&quot; &#47;&gt; <br />
Bold: &lt;b&gt;Text here&lt;&#47;b&gt; <br />
Italics: &lt;i&gt;Text Here&lt;&#47;i&gt;<br />
Title: <br />
<input type = \"text\" name = \"thread_title\" id = \"thread_title\" size = \"100\" maxlength = \"50\" />
<hr />
<textarea cols = \"100\" rows = \"20\" name = \"post_content\" id = \"page_content\"></textarea>
<br />
<input type = \"submit\" value = \"Submit\" />
</fieldset>
</form>";
}
else {
	print "<h1>You must be signed in to create a thread</h1>";
	print("Already a member? <br /> \n <a href = \"login.html\">Login Here</a> <br /> \n Not currently a member? Register free here. <br /> \n <a href = \"register.html\">Registration</a> \n </div> <br />");
}
?>
</body>
</html>