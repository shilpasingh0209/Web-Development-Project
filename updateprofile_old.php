<?php 
session_start();
include("database.php");
include("headers.php")
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>

		.bg{
			background: url('house.jpg');
		}
		body{
			background: url('img/wall9.jpg');
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>
	 <div>
	 <h1 class="text-center display-4">< нттρ ¢σffєє нσυѕє ></h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light font-weight-bold">
	<ul class="navbar-nav mr-auto ">
		<li class="nav-item">
        <a class="nav-link " href="index.php">Home</a>
     	</li>
     	<li class="nav-item">
        <a class="nav-link " href="profile.php">Profile</a>
     	</li>
     	  <li class="nav-item">
        <a class="nav-link active" href="updateprofile.php">Settings</a>
     	</li>
      	<li class="nav-item">
        <a class="nav-link " href="logout.php">Signout</a>
     	</li>
  	</ul>

	</nav>
 	<div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div class="text-center">
		<div class="form-group">
		<label>First Name</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>
		<div class="form-group">
		<label>Last Name</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>
		<div class="form-group">
		<label>Email</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>
		<div class="form-group">
		<label>Password</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>
		<div class="form-group">
		<label>Confirm Password</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>	
		<div class="form-group">
		<label>Address</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>
		<div class="form-group">
		<label>Pincode</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
		</div>
		<input type="Submit" class="btn btn-primary" name="Update" value="Save"> <br>
		</div>
		</form>
		</div>
		<!-- Delete Profile -->	

		<div class="text-center">
		<a href="delete_modal.php" class="btn btn-outline-danger mt-2" onclick="return confirm('Are you sure you want to delete??')" style="text-align:center">Delete Profile</a>

		</div>
</body>
</html>