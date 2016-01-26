<?php
	include_once "include/head.php";
?>
	
	<h1>
		<?php
			if(isset($_SESSION["user"])){
		?>
		Konto
		<?php
			}else{
		?>
		Registrieren
		<?php
			}
		?>
	</h1>

	
	<?php
		include_once "include/aside.php";
		//include_once "include/zugangssperre.php";
		
		if(isset($_SESSION["user"])){

			$kundennummer = $_SESSION['user']['kundennummer'];
			
			$abfrage = "SELECT * FROM kunden WHERE kundennummer = '".$kundennummer."'";
			$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
			$kunde = mysql_fetch_assoc($res);
			
			$vorname = htmlentities($kunde["vorname"]);
			$nachname = htmlentities($kunde["nachname"]);
			$adresse = htmlentities($kunde["adresse"]);
			$mail = htmlentities($kunde["mail"]);
			$username = htmlentities($kunde["username"]);
			$password = htmlentities($kunde["password"]);
			$plz = htmlentities($kunde["plz"]);

			$abfrage = "SELECT * FROM ort WHERE plz = '".$plz."'";
			$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
			$kunde1 = mysql_fetch_assoc($res);

			$ort = htmlentities($kunde1["ort"]);
	?>

	<section class="main">
		<form action="include/speichern.php" method="POST">
			<input type="hidden" name="kundennummer" value="<?=($kundennummer)?>" />
			<label for="vorname">Vorname</label>
			<input type="text" name="vorname" value="<?=($vorname)?>" />
			<label for="nachname">Nachname</label>
			<input type="text" name="nachname" value="<?=($nachname)?>" />
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" value="<?=($adresse)?>" />
			<input type="text" name="plz" max="5" value="<?=($plz)?>" /><input type="text" name="ort" value="<?=($ort)?>"/>
			<br/>
			<label for="username">Benutzername</label>
			<input type="text" name="username" value="<?=($username)?>"/>
			<label for="mail">E-Mail</label>
			<input type="email" name="mail" value="<?=($mail)?>"/>
			<label for="password">Passwort</label>
			<input type="password" name="password" value="<?=($password)?>"/>
			<input type="submit" value="Speichern" />
		</form>
	</section>
	
	<?php
		}else{
	?>
	
	<section class="main registration">
		<form action="include/speichern.php" method="POST">
			<label for="username">Benutzername</label>
			<input type="text" name="username" placeholder="Benutzername"/>
			<label for="mail">E-Mail</label>
			<input type="email" name="mail" placeholder="max@muster.de"/>
			<label for="mail-best">E-Mail bestätigen</label>
			<input type="email" name="mail-best" placeholder="max@muster.de"/>
			<label for="password">Passwort</label>
			<input type="password" name="password" placeholder="Password"/>
			<label for="password-best">Passwort bestätigen</label>
			<input type="password" name="password-best" placeholder="Password"/>

			<p>Mit meiner Anmeldung akzeptiere ich die <a href="agb.php">AGBs</a>.</p>
			<input type="submit" value="Speichern" />
		</form>
	</section>

<?php
		}

	include_once "include/foot.php";
?>