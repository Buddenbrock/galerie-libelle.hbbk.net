<?php
	include_once('class/class_artikel.php');
	include_once('class/class_warenkorb.php');

	session_start();
	
	include_once "datenbank.php";
?>
<!doctype html>
<html>
	<head>
		<title>Galerie Libelle</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Robots"	content="noindex, nofollow" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

		<link rel="stylesheet" href="css/screen.css" />
		<link rel="stylesheet" href="css/lightbox.css" />
		
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
		<script src="js/totop.js"></script>
	</head>
	<body>
		<section id="body">
			<header>
				<img role="logo" src="img/logo.png" title="Galerie Libelle" alt="Galerie Libelle" />
			</header>
			<section id="nav">
				<nav>
					<ul>
						<li><a href="index.php" title="Zurück zur Startseite"></a></li>
						<li><a href="exponate.php" title="zu den Exponaten">Exponate</a></li>
						<li><a href="kontakt.php" title="zm Kontaktformular">Kontakt</a></li>
						<li><a href="impressum.php" title="zu unseren Daten">Impressum</a></li>
					</ul>
					<form action="search.php" methode="POST">
						<input type="search" name="search_tag" required="required" max-length="15" placeholder="Suchen" autocomplete="on"/>
					</form>
				</nav>
			</section>
