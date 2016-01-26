<?php
	class Warenkorb {
		protected $positionen = null;

		public function __construct() {
			$this->positionen = array();
		}
		public function addArtikel($artikel,$menge) {
			// zunaechst pruefen, ob bereits eine
			// Position fuer Artikel existiert
			foreach($this->positionen as $pos) {
				if ($pos->artikel->artikelnummer == $artikel->artikelnummer) {
					// Ja, Menge uebernehmen
					$pos->menge = $menge;
					// KEINE weitere Position erzeugen
					return ;
				}
			}
			// Keine Position vorhanden:
			// neue Position fuer Artikel erstellen!
			$this->positionen[] = new WarenkorbPosition($artikel,$menge);
		}
		public function deletePosition($artikelnummer) {
			// zu loeschende Position(en) anhand
			// der ArtikelNr suchen...
			for ($n = 0; $n < sizeof($this->positionen); $n++) {
				if ($this->positionen[$n]->artikel->artikelnummer == $artikelnummer) {
					// zu entfernende Position aus Array löschen
					$this->positionen = array_merge(
						array_slice($this->positionen,0,$n),
						array_slice($this->positionen,$n+1)
					);
				}
			}
		}
		public function getPositionen() {
			return $this->positionen;
		}
		public function isEmpty() {
			return (sizeof($this->positionen) == 0);
		}
	};
	class WarenkorbPosition {
		public $artikel;
		public $menge;

		public function __construct($artikel,$menge) {
			$this->artikel = $artikel;
			$this->menge = intval($menge);
		}
		public function getBetrag() {
			return $this->menge * $this->artikel->preis;
		}
	};
	class WarenkorbMapper {
		// to be implemented:
		// speichert Warenkorb + WarenkorbPositionen in SQL-Datenbank als bestellungen/bestelldetails
	}

	if(!isset($_SESSION["warenkorb"])){
		$_SESSION['warenkorb'] = new Warenkorb();
	}
?>