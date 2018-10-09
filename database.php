<?php
      $servername="db.cs.dal.ca";
            $username="shilpa";
            $password="B00783638";
            $dbname="shilpa";
    try{
      $conn = new PDO("mysql:host=$servername; dbname=$username", $dbname, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    catch(PDOException $error){
        echo "Connection failed: " . $error->getMessage();
        }
?>