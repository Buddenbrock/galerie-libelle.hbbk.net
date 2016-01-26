<?php
// Warenkorb Klassen einlesen und sicherstellen,
// dass Warenkorb in $_SESSION vorhanden ist!
include_once('class/class_artikel.php');
include_once('class/class_warenkorb.php');

// Wenn POST-Request, dann
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$artikelnummer = $_POST['Artikelnummer'];
	session_start();
	$_SESSION['warenkorb']->deletePosition($artikelnummer);
}
// Warenkorb anzeigen
header('Location: warenkorb.php');
?>
