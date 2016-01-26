<?php
	include_once('class/class_artikel.php');
	include_once('class/class_warenkorb.php');
	
	session_start();
	$kundennummer = $_SESSION['user']['kundennummer'];
	$datum = date("Y-m-d H:i:s", time());
	
	$sqlstring = "INSERT INTO auftrag(auftragsdatum, kundennummer) VALUES ('$datum','$kundennummer')";
	mysql_query($sqlstring) or error_log($sqlstring . char(10) . mysql_error());
		
	$sqlabfrage = "SELECT * FROM auftrag WHERE auftragsdatum = '".$datum."' AND kundennummer = '".$kundennummer."'";
	$res = mysql_query($sqlabfrage) or error_log($sqlabfrage . char(10) . mysql_error());	
	$auftrag = mysql_fetch_assoc($res);
	$auftragsnummer = htmlentities($auftrag["auftragsnummer"]);
	
	
	// alle Artikel aus Datenbank als Objekte einlesen
	$artikelListe = ArtikelMapper::getArtikel();
	
		// alle WarenkorbPositionen als Objekte einlesen und anzeigen
		$positionen = $_SESSION['warenkorb']->getPositionen();
		foreach($positionen as $pos) {

			$menge = $pos->menge;
			$artikelnummer = $pos->artikel->artikelnummer;
			
			$sqlstring = "INSERT INTO auftragspos(auftragsnummer, artikelnummer, bestellmenge, bestellpreis) VALUES ('$auftragsnummer','$artikelnummer','$menge')";
			mysql_query($sqlstring) or error_log($sqlstring . char(10) . mysql_error());
			
			unset($_SESSION['warenkorb']);
		}
		
	header("Location: bestellbestaetigung.php");
?>