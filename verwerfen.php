<?php
	
	session_start();
	unset($_SESSION['warenkorb']);
	
	header("Location: exponate.php");
?>