<?php
	include_once('class/class_artikel.php');
	include_once('class/class_warenkorb.php');
	// alle Artikel aus Datenbank als Objekte einlesen
	$artikelListe = ArtikelMapper::getArtikel();
	
	include_once "include/head.php";
	include "include/zugangssperre.php";
?>


	<h1>Kasse </h1>
	<?php
		include_once "include/aside.php";

		
	if(!isset($_SESSION["warenkorb"]) || $_SESSION['warenkorb']->isEmpty()){
		
		header("Location: warenkorb.php");

	}else{
		// alle WarenkorbPositionen als Objekte einlesen und anzeigen
		$positionen = $_SESSION['warenkorb']->getPositionen();
		foreach($positionen as $pos) {

			$menge = $pos->menge;
			$artikelnummer = $pos->artikel->artikelnummer;
			$produkttitel = $pos->artikel->produkttitel;
			$produktbild = $pos->artikel->produktbild;
			$einzelpreis = number_format($pos->artikel->preis,2,',','.');
			$preis = number_format($pos->getBetrag(),2,',','.');
	?>
	<section class="main x-small">
		<a role="btn" class="btn_warenkorb mehr"  href="bestellen.php" title="Jetzt bestellen"> Jetzt bestellen</a>
		<a role="btn" class="btn_warenkorb mehr"  href="verwerfen.php" title="Bestellung verwerfen"> verwerfen</a>
	</section>
	
	<section class="main small">
		<img role="produktbild" class="small" src="<?=($produktbild) ?>"/>

		<h2><?=($produkttitel) ?></h2>
		<p class="bestellnr-anzahl">
			<label for="Produkt_ID">Artikelnummer:</label> <input type="text" name="Produkt_ID" title="Artikelnummer" value="<?=($artikelnummer) ?>" disabled="disabled" /><br/>
			<label for="Anzahl">Anzahl:</label> <input type="text" name="Anzahl" title="Anzahl" value="<?=($menge) ?>" placeholder="0" disabled="disabled"/>
		</p>

		<p role="preis" class="kasse">
			<span><?=($preis) ?> €</span>
			Einzelpreis: <?=($einzelpreis) ?> €
		</p>
	</section>

<?php
		}
	}
	
	include_once "include/foot.php";
?>