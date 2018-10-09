<?php 
class ProfileUpdate{
	public function Update($F,$L,$E,$PWD,$A,$P)
	{	echo "string";
		//$user_id = $_SESSION["USERNAME"];
		include("database.php");
		try{
				$user_id = $_SESSION["USERNAME"];
				echo "inside modal";
				$sql= 'UPDATE a1_users SET FirstName = :fn, LastName = :ln, Email = :e, Password = :p ,StreetAddress = :sa , PostalCode = :pc WHERE Email = :user';
				$stmt =  $conn->prepare($sql);
				 $stmt -> bindParam(':fn',$F);
				 $stmt -> bindParam(':ln',$L);
				 $stmt -> bindParam(':e',$E);
				 $stmt -> bindParam(':p',$PWD);
				 $stmt -> bindParam(':sa',$A);
				 $stmt -> bindParam(':pc',$P);
				 $stmt -> bindParam(':user',$user_id);
				 if($stmt->execute()){
				 header('Location:profile.php');
				 
				}
				else {
					echo "Please try again.";
				}
			}
		catch(Exception $e){
			Echo "Error ".$e;
		}

	}
	public function Call(){
		echo "call";
	}
}
?>