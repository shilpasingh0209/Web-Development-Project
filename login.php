<?php   
include("database.php");
session_start();  
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<form action="login_modal.php" method="POST">
		Enter you Email<input type="text" name="email"><br>
		Password<input type="password" name="password"><br>
		<input type="submit" name="Login">
	</form>
</body>
</html>