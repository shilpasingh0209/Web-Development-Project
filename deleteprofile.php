<?php 
include ("database.php");
include("headers.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Delete</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.jumbotronclass{
			background-color: #F8F9FA;		
			}
		body{
			background: url('img/wall9.jpg');
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>
	 <h1 class="text-center display-4"><нттρ ¢σffєє нσυѕє></h1>
	<?php
	echo "Your account has been deleted!"; 
	header("Refresh: 3; index.php"); 
	?>
</body>
</html>