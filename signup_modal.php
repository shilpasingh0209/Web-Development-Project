<?php 
class UserSignup{
	public function Signup($F,$L,$E,$PWD,$A,$P)
	{
		include("database.php");
		try{
				 $stmt =  $conn->prepare("INSERT INTO a1_users (FirstName, LastName, Email,Password,StreetAddress,PostalCode) VALUES (:fn,:ln,:e,:p,:sa,:pc)");
				 $stmt -> bindParam(':fn',$F);
				 $stmt -> bindParam(':ln',$L);
				 $stmt -> bindParam(':e',$E);
				 $stmt -> bindParam(':p',$PWD);
				 $stmt -> bindParam(':sa',$A);
				 $stmt -> bindParam(':pc',$P);
				 if($stmt->execute()){
				// $_SESSION["USERNAME"] = $E;
				 header('Location:signup_confirmation.php');
				}
				else {
					echo "Please try to signup again.";
				}
			}
		catch(Exception $e){
			Echo "Error ".$e;
		}

	}
}
?>