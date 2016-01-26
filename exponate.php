<?php
	include_once "include/head.php";
?>

	<h1>Exponate</h1>
	<?php
		include_once "include/aside.php";
	
		$abfrage = "SELECT * FROM artikel";
		
		$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
		$ergebnis = mysql_num_rows($res);
		
		if($ergebnis){
		
			while ($produkt = mysql_fetch_assoc($res)){

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
				$artikelnummer = htmlentities($produkt["artikelnummer"]);
				$preis = htmlentities($produkt["preis"]);
				
				$preis = number_format($preis, 2, ',', '');
				
	?>


				<section class="main exponate">
					<form action="intobasket.php" method="POST">
						<img role="produktbild" src="<?=($produktbild) ?>"/>

						<h2><?=($produkttitel) ?></h2>
						<p role="info">
								<label for="Produkt_ID">Artikelnummer:</label> <input type="text" name="Produkt_ID" title="Artikelnummer" value="<?=($artikelnummer) ?>" disabled="disabled" /><br/>
								<input type="hidden" name="Artikelnummer" value="<?=($artikelnummer) ?>" />
								<label for="Anzahl">Anzahl:</label> <input type="number" name="Anzahl" title="Anzahl" min="1" max="10" placeholder="0" size="2" pattern="[1-9, 0]" />
						</p>

						<p role="lagerbestand">
							Lagerbestand:&nbsp;&nbsp; <span class="<?=($lagerbestand) ?>"></span>
						</p>
						<nav class="btn">
							<a role="btn" href="produkt.php?artikelnummer=<?=($artikelnummer) ?>" class="btn_warenkorb mehr" title="zu den Details">mehr ></a>&nbsp;
							<button type="submit" role="btn" class="btn_warenkorb rein" title="Produkt zum Warenkorb hinzufügen">Warenkorb</button>
						</nav>
						<p role="preis" class="exponate">
							<span><?=($preis) ?> €</span>
							Einzelpreis: <?=($preis) ?> €
						</p>
					</form>
				</section>

	<?php
			}
		}else{
	?>
			<section class="main exponate">
				<br /><br />
				<center><h2>Leider wurden keine Produkt gefunden gefunden.<h2></center>
			</section>
	<?php
		}
		include_once "include/foot.php";
	?>