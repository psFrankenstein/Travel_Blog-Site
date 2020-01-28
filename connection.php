<?php
$con=mysqli_connect('localhost','root','qwerty','travel'); //database connection
if(!$con) // check for connection
{
	echo "<font color='red' size='9px'>Check Your Connection  For Database (*_*)</font>";
	die () ; //to stop the page exicution
}

error_reporting(0);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>travel blog-travel ideas, tips and beautiful photos to help you plan your next holiday</title>
		<link rel="icon" href="photos/icon.png" >
		<script type="text/JavaScript">
         //<!--
            function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
         //-->
      </script>
		<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	</head>
<body class="bd" onload="JavaScript:AutoRefresh(4000000);"></body>
</html>
<html>