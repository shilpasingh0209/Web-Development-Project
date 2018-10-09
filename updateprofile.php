<?php 
require_once("database.php");
//require_once("update_modal.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
		.error{
			color: red;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>
	<?php 
include("database.php");
include("headers.php");
include("update_modal.php");
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
	// $FirstName = $LastName = $Email = $Password= $hashed_password = $StreetAddress = $PostalCode= "";
	$nameErr = $LnameErr= $emailerr = $pwderr = $adderr = $postalerr = $existerror= "";
	$isError = 'False';
	// Insert into database if all the fields are correct

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first = $_POST["FirstName"];
		$last = $_POST["LastName"];
		$user_id = $_POST["Email"];
		$pwd= $_POST["password"];
		$add = $_POST["Address"];
		$pin = $_POST["Pincode"];
			if(!preg_match("/^[a-zA-Z\s]*$/",$_POST["FirstName"])){
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
			
			//Email
			if(!filter_var($user_id,FILTER_VALIDATE_EMAIL)){
					$emailerr = "Invalid Email Address";
					$isError = 'True';
			}
  		 	else {
		  		$user_id = secure_input($_POST["Email"]);
  				}
  			//Address
  			if (!preg_match("/^([a-zA-Z\s\d])*$/", $_POST["Address"])) {
  						$adderr = "Only letters and numbers are allowed";
  						$isError = 'True';
  					}
  				else{
  					$add = secure_input($_POST["Address"]);
  				}
  			//Pincode
  			if (!preg_match("/^([a-zA-Z\d])*$/", $_POST["Pincode"])) {
  				 		$postalerr = "Pincode in incorrect format";
  				 		$isError = 'True';
  				 	}
  				 elseif (strlen($_POST["Pincode"])>6) {
  				 	$postalerr = "Pincode cannot be more than 6 characters without space";
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
  					else {	
  					$pwd = secure_input($_POST["password"]);
  					// Password Hash and Salt
  					$salt = "QUsdDIl0-HWNqtCbVxDm";
					$hashed_password = hash_hmac("md5",$_POST["password"],$salt);
  				}
  		if($isError != "True"){
  			echo "Call Update";
  			require_once("update_modal.php");
  			$upobj=new ProfileUpdate();
			$upobj->Update($first,$last,$user_id,$hashed_password,$add,$pin);
			}
}
	//Fetch values from database to show used what they have already passed
	if ( !empty ($userIdToEdit) ) {
		$sql = 'SELECT * FROM a1_users where Email =?;';
		$stmt = $conn->prepare($sql);
		$stmt->execute(array($userIdToEdit));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	}

?>
	 <div>
	 <h1 class="text-center display-4"><нттρ ¢σffєє нσυѕє></h1>
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
        <a class="nav-link " href="logout.php">Logout</a>
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
			<div class="error">
			<?php echo $nameErr; ?>
			</div>	
		</div>
		<div class="form-group">
		<label>Last Name</label><br>
			<input type="text" class="form-control-sm" name="LastName" value="<?php if (empty ($last) ) echo $result["FirstName"]; else echo $last;?>">
			<br>
			<div class="error">
			<?php echo $LnameErr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Email</label><br>
			<input type="text" class="form-control-sm" name="Email" value="<?php if (empty ($last) ) echo $result["Email"]; else echo $user_id;?>">
			<br>
			<div class="error">
			<?php echo $emailerr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Password</label><br>
			<input type="password" class="form-control-sm" name="password">
			<div class="error">
			<?php echo $pwderr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Address</label><br>
			<input type="text" class="form-control-sm" name="Address" value="<?php if (empty ($add) ) echo $result["StreetAddress"]; else echo $add;?>">
			<br>
			<div class="error">
			<?php echo $adderr; ?>
			</div>
		</div>
		<div class="form-group">
		<label>Pincode</label><br>
			<input type="text" class="form-control-sm" name="Pincode" value="<?php if (empty ($pin) ) echo $result["PostalCode"]; else echo $pin;?>">
			<br>
			<div class="error">
			<?php echo $postalerr; ?>
			</div>
		</div>
		<input type="Submit" class="btn btn-primary" name="Update" value="Save" > <br>
		</div>
		</form>
		</div>
		<!-- Delete Profile -->	
		<div class="text-center">
		<a href="delete_modal.php" class="btn btn-outline-danger mt-2" onclick="return confirm('Are you sure you want to delete?')" style="text-align:center">Delete Profile</a>

		</div>
</body>
</html>