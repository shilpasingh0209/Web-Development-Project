<?php 
session_start();
include("headers.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>

		.bg{
			background: url('house.jpg');
		}
		a:hover{
			color: #6f4e37;
		}
		body{
			background: url('img/wall9.jpg');
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>

<!-- 	Text generated from  https://coolsymbol.com/cool-fancy-text-generator.html -->
	 <div>
	 <h1 class="text-center display-4"><нттρ ¢σffєє нσυѕє></h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light font-weight-bold">
	<ul class="navbar-nav mr-auto ">
		<li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
     	</li>
     	<li class="nav-item">
        <a class="nav-link " href="profile.php">Profile</a>
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
	if(isset($_SESSION["USERNAME"])){ 
		echo "Welcome ".$_SESSION["NAME"]; ?> <br> 
		 <p>Congratulations on reaching here successfully! <br>
		 Currently we have HTML, PHP, CSS in menu on the table created of Bootstrap.
		</p>
	<?php }
	else{
		session_destroy();
		header("Location:index.php");
	}
	?>
	</div>
</body>
</html>