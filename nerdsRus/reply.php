<?
session_start();
?>
<html>
<head>
<title>Reply</title>
<script type = "text/javascript">
function checkForm() {

var content = document.getElementById('page_content').value;

//get rid of whitespaces
content = content.replace(/ /g,'');


if(content == "") {
	alert("You have no content in your post");
	return false;
}
if(content != "") {
	return true;
}

}
</script>
</head>

<body>
<?
$location = $_GET['loc'];
if($_COOKIE['user'] != NULL) {
$thread_name = $_GET['type'];

print "<form action = \"reply_thread.php?thread=".$thread_name."&loc=".$location."\" method = \"post\" onsubmit=\"return checkForm()\">
<fieldset>
<legend>Create Thread</legend>
Special Characters : <br />
Hyperlinks: &lt;a href &#61; &quot;www.somewhere.com&quot; &gt; Some text here &lt;&#47;a&gt; <br />
Images: &lt;img src &#61; &quot;www.yourimagelocation.com&quot; &#47;&gt; <br />
Bold: &lt;b&gt;Text here&lt;&#47;b&gt; <br />
Italics: &lt;i&gt;Text Here&lt;&#47;i&gt;<br />

<textarea cols = \"100\" rows = \"20\" name = \"post_content\" id = \"page_content\"></textarea>
<br />
<input type = \"submit\" value = \"Submit\" />
</fieldset>
</form>";
}
else {
	print "<h1>You must be signed in to reply to a thread</h1>";
	print("Already a member? <br /> \n <a href = \"login.html\">Login Here</a> <br /> \n Not currently a member? Register free here. <br /> \n <a href = \"register.html\">Registration</a> \n </div> <br />");
}
?>
</body>
</html>