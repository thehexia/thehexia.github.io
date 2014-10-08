<?php
session_start();

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
		//register thread in database containing references to all threads in topc (thread_topicname)
		$location = $_SESSION['post_location']; //location of where thread will be posted
		$threads_index = "all_threads_index"; //location of thread index
		$title = $_POST['thread_title']; //title of the thread
		$thread_name = str_replace(" ", "", $_POST['thread_title']);//strip whitespace to create thread name
		$special_chars = array("/", "&" , "?", "!", "+", "$", ".", ";", "%", ",", "\\", "<", ">","'","\""); 
		$thread_name = str_replace($special_chars,"",$thread_name);
		$thread_name = "post_".$thread_name; //prefix table name with post_
		
		//create thread ID
		$query_threads = "SELECT p_id FROM ".$threads_index; //select rows from all_thread_index
		$check_threads = mysql_query($query_threads);
		if(is_resource($check_threads)) {
			$check_threads_num_rows = mysql_num_rows($check_threads);
		}
		else {
			die("Server has encountered problem");
		}
		
		//set thread_id = num of rows in thread index so that all threads ahve a unique ID
		$thread_id = $check_threads_num_rows;
		
		//change thread_name to ensuer no 2 tables have the same name
		$thread_name = $thread_name.$thread_id;
		
		//get user for author
		$author = $_COOKIE['user'];
		
		$today = date("F j, Y, g:i a"); //current date
		$date = date("Y:m:d-G:i:s");
		
		//add to all_thread_index table
		$query = "INSERT INTO ".$threads_index."(thread_table_name, thread_disc_loc, author, orig_date, last_post_date, title) VALUES (\"".$thread_name."\",\"".$location."\", \"".$author."\", \"".$today."\", \"".$date."\", \"".$title."\");";
		$add_record = mysql_query($query, $link);
		
		/*
		//insert into discussion table index
		$query = "INSERT INTO ".$location."(thread_id, thread_name, title) VALUES (\"".$thread_id."\",\"".$thread_name."\", \"".$title."\");";
		$add_record = mysql_query($query, $link);
		*/
		
		//create table for the thread
		$query_table = "CREATE TABLE ".$thread_name."(author text, date_post text not null, post_content text not null);";
		
		$create_table = mysql_query($query_table, $link);
		
		//add first post to table
		$content = str_replace("<script", "< script", $_POST['post_content']);
		$content = str_replace("<?php", "< ?php", $content);
		$content = htmlspecialchars($content);
		$query_post = "INSERT INTO ".$thread_name."(author, date_post, post_content) VALUES (\"".$author."\", \"".$today."\", \"".$content."\");";
		$add_post = mysql_query($query_post, $link);
		
		//If everything went as planned, then we can add 1 to the user posts number
		$user_row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='" . $_COOKIE['user'] . "'"));
		$user_posts_count = $user_row['posts'] + 1;
		$user_query = "UPDATE users SET posts=" . $user_posts_count . " WHERE username='" . $_COOKIE['user'] . "'";
		mysql_query($user_query);
		
		//close database
		mysql_close($link);
		
		//redirect to thread
		$redirect = "Location: ./read_thread.php?table_name=".$thread_name."&location=".$location;
		header($redirect);
	}
	else {
		die("Failed to access data");
	}
}
else {
//if fail
	die("Failed to connect to server");
}
?>