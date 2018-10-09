<?php 
session_start();
include("database.php");
include("headers.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>

		body{
			background: url('img/wall9.jpg');
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>
	 <div>
	 <h1 class="text-center display-4"><нттρ ¢σffєє нσυѕє></h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light font-weight-bold">
	<ul class="navbar-nav mr-auto ">
		<li class="nav-item">
        <a class="nav-link " href="index.php">Home</a>
     	</li>
     	<li class="nav-item">
        <a class="nav-link active" href="profile.php">Profile</a>
     	</li>
     	 <li class="nav-item">
        <a class="nav-link " href="updateprofile.php">Settings</a>
     	</li>
      	<li class="nav-item">
        <a class="nav-link " href="logout.php">Logout</a>
     	</li>
  	</ul>
	</nav>
	<div class="text-center">
<?php 
	if(isset($_SESSION["USERNAME"]))
	{
		$user_id = $_SESSION["USERNAME"];
		$sql = "SELECT * FROM a1_users WHERE Email = ? ";
		$stmt= $conn->prepare($sql);
		$stmt->execute(array($user_id));
		$result = $stmt->fetch();
		echo "Hello ".$result["FirstName"]."!"; ?> <br><br> <?php
		echo "Your email address is ".$result["Email"]."."; ?> <br><br> <?php
		echo "You live at ".$result["StreetAddress"]."."; ?> <br><br>
		If you want to change anything click on the Settings in the menu bar. <?php
	 }
	else{
		header("Location: index.php");
	}
	?>
	</div>
</body>
</html>