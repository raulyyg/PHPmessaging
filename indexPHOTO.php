<?php
$msg = "";
if(isset($_POST['upload'])){

	$target = "images/".basename($_FILES['image']['name']);

	$db = mysqli_connect("localhost","root","photos");

	$image = $_FILES['image']['name'];
	$text = $_POST['text'];

	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
	mysqli_query($db, $sql);

	if(move_upload_file($_FILES['tmp_name']['name'], $target)) {
		$msg = "Image uploaded succussfully";
	} else{
		$msg = "Error uploading image...";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload Forum</title>
<link rel = "stylesheet" type = "text/css" href ="style.css">
</head>
<body>
<div id = "content">
	<from method = "post" action = "indexPHOTO.php" encrypt = "multipart/form-data">
		<input type ="hidden" name = "size" value ="100000">
		<div>
			<input type = "file" name = "image">
		</div>
		<div>
			<textarea name ="text" cols = "40" rows ="4" placeholde = "Caption..."></textarea>
		</div>
		<div> 
			<input type = "submit" name = "upload" value = "Upload Image">
		</div>
	</from>
</div>
</body>
</html>