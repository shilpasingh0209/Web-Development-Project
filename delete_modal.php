<?php
	session_start();
try{
	include("database.php");
	$user_id = $_SESSION["USERNAME"];
	$sql = "DELETE FROM a1_users WHERE Email=?";
	$stmt = $conn->prepare($sql);
	if($stmt->execute(array($user_id))){
		session_destroy();
		header("Location: deleteprofile.php");
	}
}
catch(Exception $e){
	echo $e;
}
?>