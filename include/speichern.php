<?php
	include 'datenbank.php';

	session_start();
	
	if(isset($_SESSION["user"])){
		
		$kundennummer = mysql_real_escape_string($_POST['kundennummer']);
		$vorname = mysql_real_escape_string($_POST['vorname']);
		$nachname = mysql_real_escape_string($_POST['nachname']);
		$adresse = mysql_real_escape_string($_POST['adresse']);
		$username = mysql_real_escape_string($_POST['username']);
		$mail = mysql_real_escape_string($_POST['mail']);
		$password = mysql_real_escape_string($_POST['password']);

		$plz = mysql_real_escape_string($_POST['plz']);
		$ort = mysql_real_escape_string($_POST['ort']);

		$sqlstring = "UPDATE kunden SET username = '".$username."', 
										password = '".$password."', 
										vorname = '".$vorname."', 
										nachname = '".$nachname."', 
										adresse = '".$adresse."', 
										plz = '".$plz."', 
										mail = '".$mail."' 
										WHERE kundennummer = '".$kundennummer."' ";


		mysql_query($sqlstring) or error_log($sqlstring . char(10) . mysql_error());

		$sqlstring = "SELECT * FROM ort WHERE plz = '".$plz."' LIMIT 1";
		$res = mysql_query($sqlstring) or error_log($sqlstring . char(10) . mysql_error());

		if(!mysql_num_rows($res) == 1){

			$sqlstring = "INSERT INTO ort(plz, ort) VALUE ('$plz', '$ort')";
			mysql_query($sqlstring) or error_log($sqlstring . char(10) . mysql_error());
			header('Location: ../index.php');
		}
		header('Location: ../konto.php');
		
		
	}else{
		$username = mysql_real_escape_string($_POST['username']);
		$mail = mysql_real_escape_string($_POST['mail']);
		$mail_best = mysql_real_escape_string($_POST['mail-best']);
		$password = mysql_real_escape_string($_POST['password']);
		$password_best = mysql_real_escape_string($_POST['password-best']);

		if($mail == $mail_best && $password == $password_best){

			$sqlstring = "INSERT INTO kunden(username, password, mail) VALUES ('$username','$password','$mail')";

			mysql_query($sqlstring) or error_log($sqlstring . char(10) . mysql_error());
			header('Location: ../index.php');
		}else{
			header('Location: ../konto.php');
		}
	}


?>