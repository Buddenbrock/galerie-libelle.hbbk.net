<?php
include_once('include/datenbank.php');

class Artikel {
	public $artikelnummer = null;
	public $produkttitel = null;
	public $produktbild = null;
	public $preis = null;

	public function __construct($artikelnummer,$produkttitel,$produktbild,$preis) {
		$this->artikelnummer = $artikelnummer;
		$this->produkttitel = $produkttitel;
		$this->produktbild = $produktbild;
		$this->preis = $preis;
	}
};
class ArtikelMapper {
	/*
	 * getArtikel(): * Artikel als Objektinstanzen einlesen
	 * optionaler Parameter ArtikelNr
	 */
	public static function getArtikel($artikelnummer=null) {
		$artikel = array();
		$sql = "SELECT * FROM artikel";
		if (!is_null($artikelnummer)) {
			$sql .= " WHERE artikelnummer = " . $artikelnummer;
		}
		$query = mysql_query($sql);
		while ($result = mysql_fetch_assoc($query)) {
			$artikel[] = new Artikel($result['artikelnummer'],$result['titel'],$result['bild'],$result['preis']);
			// alternative Syntax, um $a dem Array $artikel anzuhaengen:
			// array_push($artikel,$a);
		}
		return $artikel;
	}
};
?>
