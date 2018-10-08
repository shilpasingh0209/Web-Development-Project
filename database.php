<?php
   define('DB_SERVER', 'db.cs.dal.ca');
   define('DB_USERNAME', 'shilpa');
   define('DB_PASSWORD', 'B00783638');
   define('DB_DATABASE', 'shilpa');
		try{
			$pdo = new PDO('mysql:host=localhost; dbname=test','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $error){
    		echo "Connection failed: " . $error->getMessage();
    		}
?>