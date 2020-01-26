<!DOCTYPE html>

<html>
<head>
	<title> REGISTER - Messenger</title>
</head>
<body>

<?php include 'connect.php'; ?>

<?php include 'functions.php'; ?>

<?php include 'title_bar.php'; ?>

<br/>
<div><h3>Register to begin sending messages.</h3>
<form method = 'post'>
<?php
if(isset($_POST['register']))
{
		$userFullName = $_POST['userFullName'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		if(empty($userFullName) or empty($username) or empty($password))
		{
			$message = "Cannot have any fields empty! ";

		}else
		{
			mysql_query("INSERT INTO users VALUES( '', '$userFullName', '$username','$password')");
			$message = "Registered Successfully!";
		}
		echo "<p>$message</p>";
}
?>
Name : <br/>
<input type ='text' name = 'userFullName'/>
<br/>
Username : <br/>
<input type ='text' name = 'username'/>
<br/>
Password : <br/>
<input type = 'password' name = 'password' />
<br/><br/>
<input type = 'submit' name = 'register' value ='Register' /> 
</form>
</form>
</div>


</html>
	