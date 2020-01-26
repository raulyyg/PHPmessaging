<!DOCTYPE html>

<html>
<head>
	<title>New Conversation...</title>
</head>
<body>

<?php include 'connect.php'; ?>

<?php include 'functions.php'; ?>

<?php include 'title_bar.php'; ?>

<h3>Welcome to Messenger</h3>

<?php include 'message_title_bar.php'; ?>
<br/>

<div>

<?php 
if(isset($_GET['user']) && !empty($_GET['user']))
{
?>
		<form method = 'post'>
		<?php
		if(isset($_POST['message']) && !empty($_POST['message'])){
			$my_id = $_SESSION['user_id'];
			$user = $_GET['user'];
			$random_number = rand();
			$message = $_POST['message'];

			$check_connection = mysql_query("SELECT hash FROM message_group WHERE(user_one = $my_id AND user_two = $user) OR (user_one = $user AND user_two = $my_id)");
			if(mysql_num_rows($check_connection) == 1)
			{
				echo "<p>*Conversation already in session.</p>";
			}
			else{
			mysql_query("INSERT INTO message_group VALUES('$my_id', '$user', '$random_number')");
			mysql_query("INSERT INTO messages VALUES('', '$random_number','$my_id', '$message')");
			echo " <p>Message Sent!</p>";
		}
		}

		?>
		Enter Message: <br/>
		<textarea name = 'message' rows = '2' cols= '20'> </textarea>
		<br></br>
		<input type = 'submit' value= 'Send Message' />
		</form>
	
<?php
}else
{
	echo "<b>Select User</b>";
	$user_list = mysql_query("SELECT id , username FROM users");
	while($run_user = mysql_fetch_array($user_list)){
		$user = $run_user['id'];
		$username = $run_user['username'];

		echo "<p><a href = 'send.php?user=$user' > $username</a></p>";
	}
}

?>

</div>
</body>
</html>
	
