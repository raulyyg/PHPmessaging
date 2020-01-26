<div>

<?php

if(loggedin())
{
?>
	<a href ='Assignment3.php'> Home </a> |
	<a href ='message.php'> Messages </a> |
	<a href ='logout.php'> Log Out </a> 
<?php
}else{
?>
	<a href ='Assignment3.php'> Home </a> |
	<a href ='login.php'> Log In </a> |
	<a href ='register.php'> Register </a>
<?php
}
?>

</div>