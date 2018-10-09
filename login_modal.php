<?php
session_start();  
$user_id = $_POST["Email"];
$salt = "QUsdDIl0-HWNqtCbVxDm";
 $hashed_password = hash_hmac("md5",$_POST["password"],$salt);
 class UserLogin{
 	public function login($id,$pwd)
 	{
		include ("database.php");		
 		try{
 			$stmt = $conn->prepare("SELECT * FROM a1_users where Email =? and Password= ?");
			$stmt->execute(array($id,$pwd));
			$result = $stmt->fetch();
			//echo $id;
			//echo $result['Email'];
			$count = $stmt->rowCount();					
			if($count == 1){
 			$_SESSION["USERNAME"]=$id;
 			$_SESSION["NAME"]=$result["FirstName"];
 			header("Location: home.php");
 			exit();
 			}
 			else{
 				$str = "Invalid Email Address or Password";
 				$_SESSION["LOGINERROR"] = $str;
 				header("Refresh: 1; login.php");
 				return $str;
 			}
 		}
 		catch(Exception $e){
 			echo $e;
 		}
 	}
 }
 $loginobj = new UserLogin();
 $loginobj->login($user_id,$hashed_password);
?>