<?php 
include ("database.php");
include ("signup_modal.php");
//include("headers.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.jumbotronclass{
			background-color: #F8F9FA;		
			}
		.bg{
			background: url('house.jpg');
		}
		.error{
			color: red;
		}
		body{
			background: url('img/wall9.jpg');
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>
<?php
	function secure_input($value){
			$value = trim($value);
			$value = stripslashes($value);
			$value = htmlspecialchars($value);
			return $value;
			}
	$nameErr = $LnameErr= $emailerr = $pwderr = $adderr = $postalerr = $existerror= "";
	$isError = 'False';
	// Insert into database if all the fields are correct
	$count=0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first = $_POST["FirstName"];
		$last = $_POST["LastName"];
		$user_id = $_POST["Email"];
		$pwd = $_POST["password"];
		$add = $_POST["Address"];
		$pin = $_POST["Pincode"];
		//check email does not exist
		if(!empty($user_id))
		{
		$sql = 'SELECT Email FROM a1_users where Email =?;';
		$stmt = $conn->prepare($sql);
		$stmt->execute(array($user_id));
		$result = $stmt->fetch();
		$count = $stmt->rowCount();	
		}
		if($count>0){
			$existerror="Email already exists";
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
  		 		if (empty($_POST["LastName"])) {
    					$LnameErr = "Last Name is required";
    					$isError = 'True';
  				} 
			elseif(!preg_match("/^[a-zA-Z\s]*$/",$_POST["LastName"])){
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
  				elseif (strlen($_POST["Pincode"])>6) {
  				 	$postalerr = "Pincode cannot be more than 6 characters without space";
  				 	$isError = 'True';
  				 }			
  					elseif (!preg_match("/^([a-zA-Z\s\d])*$/", $_POST["Pincode"])) {
  				 		$postalerr = "Pincode in incorrect format";
  				 		$isError = 'True';
  				 	}
  					else{
  					$pin = secure_input($_POST["Pincode"]);
   				}
   			//Password
   			if(empty($_POST["password"])) {
  					$pwderr = "Password is required";
  					$isError = 'True';
  				} 
  					elseif(ctype_space($_POST["password"])){
					$pwderr = "Password cannot not contain any space";
  					$isError = 'True';
  					}
  					elseif(strlen($_POST["password"]) <8) {               
  					$pwderr = "Password must be 8 characters";
  					$isError = 'True';
  				} 
  					elseif($_POST["password"] != $_POST["confirmpassword"]){
  					$pwderr = "Password do not match";
  					$isError = 'True';
  				}
  					else {	
  					$pwd = secure_input($_POST["password"]);
  					// Password Hash and Salt
  					$salt = "QUsdDIl0-HWNqtCbVxDm";
					$hashed_password = hash_hmac("md5",$_POST["password"],$salt);
  				}
  		if($isError != "True"){
  			$signupobj=new UserSignup();
			$signupobj->Signup($first,$last,$user_id,$hashed_password,$add,$pin);
		}
}
?>
	 <div>
	 <h1 class="text-center display-4">< нттρ ¢σffєє нσυѕє ></h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light font-weight-bold">
	<ul class="navbar-nav mr-auto ">
		<li class="nav-item">
        <a class="nav-link " href="index.php">Home</a>
     	</li>
      	 <li class="nav-item ">
        <a class="nav-link" href="login.php">Login</a>
    	</li>
      	<li class="nav-item">
        <a class="nav-link active" href="signup.php">Signup</a>
     	</li>
  	</ul>

	</nav>
	
	<div class="text-center">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div class="form-group">
		<label>First Name</label><br>
			<input type="text" class="form-control-sm" name="FirstName">
			<br>
			<div class="error">
			<?php echo $nameErr; ?>
			</div>	
		</div>
		<div class="form-group">
		<label>Last Name</label><br>
			<input type="text" class="form-control-sm" name="LastName">
			<br>
			<div class="error">
			<?php echo $LnameErr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Email</label><br>
			<input type="text" class="form-control-sm" name="Email">
			<div class="error">
			<?php echo $emailerr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Password</label><br>
			<input type="password" class="form-control-sm" name="password">
		</div>
		<div class="form-group">
		<label>Re-enter Password</label><br>
			<input type="password" class="form-control-sm" name="confirmpassword">
			<div class="error">
			<?php echo $pwderr; ?>
			</div>
		</div>
		<div class="form-group">
		<label> Address </label><br>
			<input type="text" class="form-control-sm" name="Address">
			<div class="error">
			<?php echo $adderr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Pincode</label><br>
			<input type="text" class="form-control-sm" name="Pincode">
			<div class="error">
			<?php echo $postalerr; ?>
			</div>
		</div>
		<input type="Submit" class="btn btn-secondary" name="SignUp" value="Signup">
		<div class="error">
		<?php echo $existerror; ?>
		</div>
		</form>	   
	</div>
</body>
</html>