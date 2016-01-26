<?php
	include_once('class/class_artikel.php');
	include_once('class/class_warenkorb.php');
	// alle Artikel aus Datenbank als Objekte einlesen
	$artikelListe = ArtikelMapper::getArtikel();
	
	include_once "include/head.php";
?>

	<h1>Warenkorb</h1>
	<?php
		include_once "include/aside.php";


		if(!isset($_SESSION["warenkorb"]) || ($_SESSION['warenkorb']->isEmpty())){
	?>
		<section class="main">
			<br /><br />
			<center><h2>Ihr Warenkorb ist leer. Bitte fügen sie ein Produkt ihrer Wahl hinzu.</h2></center>
			<br/><br/><br/>
			<a role="btn" href="exponate.php" title="Zurück zu den Exponaten">Zurück zu den Exponaten</a>
		</section>
	<?php		
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

					<section class="main exponate">
						<form action="deleteposition.php" method="POST">
							<img role="produktbild" src="<?=($produktbild) ?>"/>

							<h2><?=($produkttitel) ?></h2>
							<p role="info">
								<label for="Produkt_ID">Artikelnummer:</label> <input type="text" name="Produkt_ID" title="Artikelnummer" value="<?=($artikelnummer) ?>" disabled="disabled" /><br/>
								<input type="hidden" name="Artikelnummer" value="<?=($artikelnummer) ?>" />
								<label for="Anzahl">Anzahl:</label> <input type="number" name="Anzahl" title="Anzahl" value="<?=($menge) ?>" size="2" disabled="disabled"/>
							</p>

							<nav class="btn">
								<button type="submit" role="btn" class="btn_warenkorb raus" title="Produkt zum Warenkorb hinzufügen">Warenkorb</button>
							</nav>
							<p role="preis" class="exponate">
								<span><?=($preis) ?> €</span>
								Einzelpreis: <?=($einzelpreis) ?> €
							</p>
						</form>
					</section>
	<?php
			}
		}
		include_once "include/foot.php";
	?>