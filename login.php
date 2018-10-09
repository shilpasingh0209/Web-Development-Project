<?php   
session_start();
include("database.php");
//include("headers.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.jumbotronclass{
			background: url('img/wall9.jpg');
			}
		.error{
			color :red;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body class="jumbotronclass">

	<div class="jumbotron.fluid text-center">
<!-- 	Text generated from  https://coolsymbol.com/cool-fancy-text-generator.html -->
	  <h1 class="display-4">< нттρ ¢σffєє нσυѕє ></h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-lights font-weight-bold ">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
     	</li>
     	 <li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
    	</li>
      	<li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
     	</li>
  		</ul>
	</nav>
	<div class="row">
	<div class="col-sm-6 mx-auto">
	<div class="text-center">

	<form action="login_modal.php" method="POST">
		<div class="form-group ">
		<div class="form-group">
		<label>Email</label><br>
			<input type="text" class="form-control-sm" name="Email">
		</div>
		<div class="form-group">
		<label>Password</label><br>
			<input type="password" class="form-control-sm" name="password">
		</div>
		<input type="Submit" class="btn btn-secondary" name="Login" value="Login">
		<div class="error">
		<?php 
		if(isset($_SESSION["LOGINERROR"])){
		echo $_SESSION["LOGINERROR"]; 
		session_destroy();
		}
		?>
		</div>
	</div>
	</form>
	</div>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>