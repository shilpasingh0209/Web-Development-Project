<?php 
session_start();
include("database.php");
include("headers.php")
$userIdToEdit = $_SESSION["USERNAME"];
$first = "";
$last = "";
$user_id = "";
$add = "";
$pin = "";

	function secure_input($value){
			$value = trim($value);
			$value = stripslashes($value);
			$value = htmlspecialchars($value);
			return $value;
			}
	$FirstName = $LastName = $Email = $Password= $hashed_password = $StreetAddress = $PostalCode= "";
	$nameErr = $LnameErr= $emailerr = $pwderr = $adderr = $postalerr = $existerror= "";
	$isError = 'False';
	// Insert into database if all the fields are correct

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first = $_POST["FirstName"];
		$last = $_POST["LastName"];
		$user_id = $_POST["Email"];
		$add = $_POST["Address"];
		$pin = $_POST["Pincode"];
		//check email does not exist
		$count=0;
		if(!empty($user_id)){
		$sql = 'SELECT Email FROM a1_users where Email =? ';
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($user_id));
		$result = $stmt->fetch();
		$count = $stmt->rowCount();	
		}
		if($count>0){
			$existerror="Email Address already exist";
			$isError = 'True';
		}
		else{
			// Form Validation
			// First Name
			if (empty($_POST["FirstName"])) {
    					$nameErr = "First Name is required";
    					$isError = 'True';
  				} 
  					elseif (!preg_match("/^[a-zA-Z\s]*$/",$_POST["FirstName"])){
  					$nameErr = "Only letters and white space are allowed";
  					$isError = 'True';
  				}
  					else {
  					$first = secure_input($_POST["FirstName"]); 
  		 		}
  		 	//Last Name
			if(!preg_match("/^[a-zA-Z\s]*$/",$_POST["LastName"])){
  					$LnameErr = "Only letters and white space are allowed";
  					$isError = 'True';
  				}
  					else {
  					$last = secure_input($_POST["LastName"]); 
  		 		}
			}
			//Email
			if(empty($_POST["Email"])){
  				$emailerr = "Email is required";
  				$isError = 'True';
  		 			}
  		 	elseif(!filter_var($user_id,FILTER_VALIDATE_EMAIL)){
					$emailerr = "Invalid Email Address";
					$isError = 'True';
			}
  		 	else {
		  		$user_id = secure_input($_POST["Email"]);
  				}
  			//Address
  			if (empty($_POST["Address"])) {
  					$adderr = "Address is required.";
  					$isError = 'True';
  				} 
  					elseif (!preg_match("/^([a-zA-Z\s\d])*$/", $_POST["Address"])) {
  						$adderr = "Only letters and numbers are allowed";
  						$isError = 'True';
  					}
  					else{
  					$add = secure_input($_POST["Address"]);
  				}
  			//Pincode
  			if (empty($_POST["Pincode"])) {
  					$postalerr = "Postal Code is required.";
  					$isError = 'True';
  				}  				
  					elseif (!preg_match("/^([a-zA-Z\s\d])*$/", $_POST["Pincode"])) {
  				 		$postalerr = "Pincode in incorrect format";
  				 		$isError = 'True';
  				 	}
  					else{
  					$pin = secure_input($_POST["Pincode"]);
   				}
   			
  		if($isError != "True"){
  			$signupobj=new UserSignup();
			$signupobj->update($first,$last,$user_id,$add,$pin);
			 //header("Location: signup_modal.php");
		}
	}
	
	if ( !empty ($userIdToEdit) ) {
		$sql = 'SELECT Email FROM a1_users where Email =?;';
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($userIdToEdit));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
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
			<input type="text" class="form-control-sm" name="FirstName" value="<?php if (empty ($first) ) echo $result["FirstName"]; else echo $first;?>">
			<br>
		</div>
		<div class="form-group">
		<label>Last Name</label><br>
			<input type="text" class="form-control-sm" name="LastName" value="<?php if (empty ($last) ) echo $result["FirstName"]; else echo $last;?>">
			<br>
		</div>
		<div class="form-group">
		<label>Email</label><br>
			<input type="text" class="form-control-sm" name="Email" value="<?php if (empty ($last) ) echo $result["Email"]; else echo $user_id;?>">
			<br>
		</div>			
		<div class="form-group">
		<label>Address</label><br>
			<input type="text" class="form-control-sm" name="Address" value="<?php if (empty ($add) ) echo $result["Address"]; else echo $add;?>">
			<br>
		</div>
		<div class="form-group">
		<label>Pincode</label><br>
			<input type="text" class="form-control-sm" name="Pincode" value="<?php if (empty ($pin) ) echo $result["Pincode"]; else echo $pin;?>">
			<br>
		</div>
		<input type="Submit" class="btn btn-primary" name="Update" value="Save" > <br>
		</div>
		</form>
		</div>
		<!-- Delete Profile -->	
		<div class="text-center">
		<a href="delete_modal.php" class="btn btn-outline-danger mt-2" onclick="return confirm('Are you sure you want to delete??')" style="text-align:center">Delete Profile</a>

		</div>
</body>
</html>