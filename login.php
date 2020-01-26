<!DOCTYPE html>

<html>
<head>
	<title> LOGIN - Messenger</title>
</head>
<body>

<?php include 'connect.php'; ?>

<?php include 'functions.php'; ?>

<?php include 'title_bar.php'; ?>

<br/>
<div><h3>If registered already, please login.</h3>
<form method = 'post'>
<?php
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if(empty($username) or empty($password))
	{
		$message = "*Please fill out all empty fields.";

	}else
	{
		$check_login = mysql_query("SELECT id FROM users WHERE username = '$username' AND password = '$password' ");
		if(mysql_num_rows($check_login) == 1)
		{
			$run_login = mysql_fetch_array($check_login);
			$user_id= $run_login['id'];
			$_SESSION['user_id'] = $user_id;

			header('location: Assignment3.php');

		}else
		{
			$message = "*username or password are incorrect";
		}
	}

	echo "<p>$message</p>";
}
?>

Username : <br/>
<input type ='text' name = 'username'/>
<br/>
Password : <br/>
<input type = 'password' name = 'password' />
<br/><br/>
<input type = 'submit' name = 'login' value ='Login' /> 
</form>
</form>
</div>


</html>
	