<?php
	// Warenkorb Klassen einlesen und sicherstellen,
	// dass Warenkorb in $_SESSION vorhanden ist!
	include_once('class/class_artikel.php');
	include_once('class/class_warenkorb.php');

	// Wenn POST-Request, dann
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$artikelnummer = $_POST['Artikelnummer'];
		$menge = $_POST['Anzahl'];
		
		if($menge <= "1"){
			$menge = "1";
		}else if($menge >= "10"){
			$menge = "10";
		}
		
		// zu "artnr" passenden Artikel als Objekt aus SQL-Datenbank einlesen
		$artikel = ArtikelMapper::getArtikel($artikelnummer);
		// Ergebnis dieser Funktion ist IMMER ein Array!
		// in diesem Fall sollte es aber nur EINEN passenden Artikel geben!
		if (sizeof($artikel) == 1) {
		
			session_start();
			
			if(!isset($_SESSION["warenkorb"])){
				$_SESSION['warenkorb'] = new Warenkorb();
			}
			
			// Artikel mit Menge dem Warenkorb hinzufuegen
			$_SESSION['warenkorb']->addArtikel($artikel[0],$menge);
			
		}
	}

	// Warenkorb anzeigen
	header('Location: warenkorb.php');
?>