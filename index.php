<?php 
include("headers.php");
?>
<!-- If the user is already logged in they will redirect to Homepage -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Http Coffee House</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.jumbotronclass{
			background: url('img/wall9.jpg');
			}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body class="jumbotronclass">
	<?php if(isset($_SESSION["USERNAME"])) 
			{ 
				header('Location: home.php');
			 } ?>
	<div class="jumbotron.fluid text-center">
<!-- 	Text generated from  https://coolsymbol.com/cool-fancy-text-generator.html -->
	  <h1 class="display-4">< нттρ ¢σffєє нσυѕє ></h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-lights font-weight-bold ">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
     	</li>
     	 <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    	</li>
      	<li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
     	</li>
  		</ul>
	</nav>
	<div class="row my2">
    <div class="col-sm-8 col-xs-8 col-sm-8 col-lg-8">
	<div class="container-fluid text-xl-left text-monospace ">
!DOCTYPE html <br>
html lang="en" <br>
meta charset="utf-8" <br>
head <br>
title <br>
About HTTP Coffee House <br>
/title <br>
/head <br>
body <br>

<b>Wondering what is HTHP Coffee House? </b> <br>
HTHP is a combination of short hand for HTML and PHP. <br> 
It is a virtual coffee house exisiting in a nowhere land. <br>
The menu has variety of tags and the interiors are made of cascading style sheet. <br>
Try w3schools to learn more. <br>
/body<br>
/html<br>


	</div>
	</div>
	<div class="col-sm-4 col-xs-4 col-sm-4 col-lg-4">
		<img src="img/coffee2.jpg" class="img-thumbnail" alt="thumbnail1">
		<img src="img/coffee3.jpg" class="img-thumbnail rounded float-right" alt="thumbnail2">
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>