<!DOCTYPE html>

<html>
<head>
	<title>Conversations</title>
</head>
<body>

<?php include 'connect.php'; ?>

<?php include 'functions.php'; ?>

<?php include 'title_bar.php'; ?>

<h3>Welcome to Messenger</h3>

<?php include 'message_title_bar.php'; ?>
<?php $my_id = $_SESSION['user_id']; ?>
<br/>

<div>
<?php
if(isset($_GET['hash']) && !empty($_GET['hash']))
{
	$hash = $_GET['hash'];
	$message_query = mysql_query("SELECT from_id, message FROM messages WHERE group_hash = '$hash' ");
	while($run_message = mysql_fetch_array($message_query))
	{
		$from_id = $run_message['from_id'];
		$message = $run_message['message'];

		$user_query = mysql_query("SELECT username FROM users WHERE id ='$from_id'");
		$run_user = mysql_fetch_array($user_query);
		$from_username = $run_user['username'];

		echo "<p><b>$from_username</b><br/>$message</p>";
	}
?>
	<br/>
	<form method = 'post'>
	<?php
	if(isset($_POST['message']) && !empty($_POST['message']))
	{
		$new_message = $_POST['message'];
		mysql_query("INSERT INTO messages VALUES('','$hash', '$my_id', '$new_messages')");
		header('location: conversations.php?hash='.$hash);
	}
	?>
	Enter Message: <br/>
	<textarea name = 'message' rows= '2' cols = '20'></textarea>
	<br/><br/>
	<input type = 'submit' value = "Send Message" /></form>

<?php
} else {
	
	echo "<b>Select Conversation: </b>";
	$get_conv = mysql_query("SELECT hash, user_one, user_two from message_group WHERE user_one= '$my_id' OR user_two = '$my_id'");
	while($run_conv = mysql_fetch_array($get_conv))
	{
		$hash = $run_conv['hash'];
		$user_one = $run_conv['user_one'];
		$user_two = $run_conv['user_two'];

		if($user_one == $my_id)
		{
			$select_id = $user_two;
		}else{
			$select_id = $user_one;
		}
	}
		$user_get = mysql_query("SELECT username FROM users WHERE id = '$select_id'");
		$run_user = mysql_fetch_array($user_get);
		$select_username = $run_user['username'];

	echo "<p><a href = 'conversations.php? hash=$hash'>$select_username</a></p>";
}

?>

</div>
</body>
</html>
	