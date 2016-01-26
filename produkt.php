<?php
	include_once "include/head.php";
	
		$artikelnummer = $_REQUEST['artikelnummer'];
		$abfrage1 = "SELECT * FROM artikel WHERE Artikelnummer = '".$artikelnummer."'";
		$res1 = mysql_query($abfrage1) or error_log($abfrage1 . char(10) . mysql_error());
		$produkt = mysql_fetch_assoc($res1);

		$kategorienummer = $produkt["kategorienummer"];		
		$abfrage = "SELECT * FROM kategorie WHERE kategorienummer = '".$kategorienummer."'";
		$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
		$produkt1 = mysql_fetch_assoc($res);	
		$kategorie = htmlentities($produkt1["kategoriename"]);
		
		$artikelnummer = htmlentities($produkt["artikelnummer"]);
?>

	<h1>Produkt - <?=($artikelnummer) ?></h1>
	<?php
		include_once "include/aside.php";

		$bestand = htmlentities($produkt["bestand"]);
		
		if ($bestand <= 0){
			$lagerbestand = "bg_danger";
		}else if($bestand <= 3 && $bestand > 0 ){
			$lagerbestand = "bg_warning";
		}else{
			$lagerbestand = "bg_success";
		}
		
		$produktbild = htmlentities($produkt["bild"]);
		$produkttitel = htmlentities($produkt["titel"]);
		$produktbeschreibung = htmlentities($produkt["beschreibung"]);
		$preis = htmlentities($produkt["preis"]);
		$preis = number_format($preis, 2, ',', '');
		$masse = htmlentities($produkt["masse"]);
		$farbe = htmlentities($produkt["farbe"]);
		$sonstiges = htmlentities($produkt["sonstiges"]);
	?>
	
	</script>
	
	<section class="main">
		<form action="intobasket.php" method="POST">
			<a href="<?=($produktbild) ?>" data-lightbox="<?=($artikelnummer) ?>" data-title="<?=($produkttitel) ?>">
				<img role="produktbild" class="big" src="<?=($produktbild) ?>"/>
			</a>

			<h2><?=($produkttitel) ?></h2>
			<p role="produktbeschreibung">
				<?=($produktbeschreibung) ?>
			</p>
			<p class="anzahl-lagerbestand">
				<label for="Anzahl">Anzahl:</label> <input type="number" id="anzahl" name="Anzahl" title="Anzahl" min="1" max="10" placeholder="0" size="2" pattern="[1-9, 0]" /><br />
				Lagerbestand:&nbsp;&nbsp; <span class="<?=($lagerbestand) ?>"></span>
			</p>
			
			<button role="btn" class="btn_warenkorb rein produkt" title="Produkt zum Warenkorb hinzufügen">Warenkorb</button>
			
			<p role="preis" class="produkt">
				<span><?=($preis) ?> €</span>
				Einzelpreis: <?=($preis) ?> €
			</p>
				<h3>Produktdetails</h3>
				<table>
					<tr><td><label for="kategorie">Produktkategorie:</label></td><td><?=($kategorie) ?></td></tr>
					<tr><td><label for="masse">Maße:</label></td><td><?=($masse)?></td></tr>
					<tr><td><label for="Produkt_ID">Artikelnummer:</label></td><td><?=($artikelnummer) ?><input type="hidden" name="Artikelnummer" value="<?=($artikelnummer) ?>" /></td></tr>
					<tr><td><label for="farbe">Farbe:</label></td><td><?=($farbe) ?></td></tr>
					<tr><td><label for="sonstiges">Sonstiges:</label></td><td><?=($sonstiges) ?></td></tr>
				</table>
			<br /><br />
			<a role="btn" href="exponate.php" title="zurück zur Übersicht">zurück zur Übersicht</a>
		</form>
	</section>
	
<?php
	include_once "include/foot.php";
?>