<?php
$con=mysqli_connect('localhost','root','qwerty','travel'); //database connection
if(!$con) // check for connection
{
	echo "<font color='red' size='9px'>Check Your Connection  For Database (*_*)</font>";
	die () ; //to stop the page exicution
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body class="bd"></body>
</html>