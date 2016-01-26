<?php
	session_start();
	
	$besuchte_URL = mysql_real_escape_string($_REQUEST['url']);
	
	if(!isset($_SESSION["user"])){
		include 'datenbank.php';

		$user = mysql_real_escape_string($_REQUEST['user']);
		
		if(isset($user) && $user!= null){
			
			$password = mysql_real_escape_string($_REQUEST['password']);
			
			$abfrage = "SELECT * FROM kunden WHERE username = '".$user."'";
			
			$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
			
			$dsatz_user = mysql_fetch_assoc($res);
			
			$db_user = $dsatz_user["username"];
			$db_password = $dsatz_user["password"];
			
			if($user == $db_user && $password == $db_password){
				$_SESSION["user"] = $dsatz_user;
			}
		}
	}else{
		session_destroy();
		$_SESSION = array();
	}
	
	header("Location: ".$besuchte_URL);
	
?>