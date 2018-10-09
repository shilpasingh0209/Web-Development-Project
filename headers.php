<?php
if(!isset($_COOKIE["session_name"])){
	$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
}
else{
	$_SESSION['HTTP_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT'];
}

?>