<?php
	include_once "include/head.php";
?>


	<h1>Startseite</h1>
	<?php
		include_once "include/aside.php";

		$abfrage = "SELECT * FROM artikel";
				
		$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
		$max = mysql_num_rows($res);
		$rand_zahl = rand(1, $max);
		$pos = "0";

	?>


	<section class="main index">
	
	<?php
	
		$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
		$max = mysql_num_rows($res) -1 ;
		$rand_zahl = rand(1, $max);
		$pos = "0";
	
		while($produkt = mysql_fetch_assoc($res)){
			
			$pos += "1";
			
			if($pos == $rand_zahl){
				$artikelnummer = htmlentities($produkt["artikelnummer"]);
				$produktbild = htmlentities($produkt["bild"]);
				$produkttitel = htmlentities($produkt["titel"]);
	?>
		<a href="produkt.php?artikelnummer=<?=($artikelnummer) ?>"><img role="index_img" class="big" src="<?=($produktbild) ?>" title="<?=($produkttitel) ?>" /></a>
	<?php
			}
		}
	
	
	
		$res = mysql_query($abfrage) or error_log($abfrage . char(10) . mysql_error());
		$pos = "0";
	
		while($pos != '6' || $pos < '6'){
			$produkt = mysql_fetch_assoc($res);
			$pos += "1";
				
			$artikelnummer = htmlentities($produkt["artikelnummer"]);			
			$produktbild = htmlentities($produkt["bild"]);
			$produkttitel = htmlentities($produkt["titel"]);
			$preis = htmlentities($produkt["preis"]);
			
			if($pos != $rand_zahl){
				
	?>
		<a href="produkt.php?artikelnummer=<?=($artikelnummer) ?>"><img role="index_img" src="<?=($produktbild) ?>" title="<?=($produkttitel) ?>" /></a>
	<?php
			}
		}
	?>
		<div class="clear_both" />
	</section>


<?php
	include_once "include/foot.php";
?>