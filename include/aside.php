		<aside>
				<?php
					$url = $_SERVER['REQUEST_URI'];
					if(!isset($_SESSION["user"])){
				?>
					<!-- aside bei nicht angemeldetem User -->
					<section class="login">
						<h2>Login</h2>
						<form action="include/login.php" methode="_POST">
							<label for="User">Benutzername:</label>
							<input type="text" name="user" placeholder="Benutzername" />
							<label for="password">Password:</label>
							<input type="password" name="password" placeholder="Passwort" />
							<input type="hidden" name="url" value="<?=$url;?>" />
							<input type="submit" name="submit" Value="Anmelden"/>
						</form>
					</section>
					
					<section class="login">
						<h2>Neu bei uns?</h2>
						Jetzt anmelden. Das geht schnell und einfach.<br/><br/><br/><br/>
						<a href="konto.php" title="Neu anmelden">Neu anmelden</a>
					</section>
					
				<?php
					}else{
				?>

				<!-- aside bei angemeldetem User -->
				<section class="login">
					<h2>Mein Konto</h2>
					<br/>
					<p role="user-login">
						
						
						<?php
							if($_SESSION['user']['vorname'] == null && $_SESSION['user']['nachname'] == null || $_SESSION['user']['vorname'] == null && $_SESSION['user']['nachname'] != null ){
								echo $_SESSION['user']['username'];
							}else if($_SESSION['user']['vorname'] != null && $_SESSION['user']['nachname'] == null){
								echo $_SESSION['user']['vorname'];
							}else{
								echo $_SESSION['user']['vorname']." ".$_SESSION['user']['nachname'];
							}	
						?>
					</p>
					<nav>
						<a href="konto.php" title="Meine Kontodaten ändern">Meine Daten ändern</a>
						<a href="include/login.php?url=<?=$url?>" title="Abmelden">Abmelden</a>
					</nav>
				</section>

				<section class="login">
					<h2>Warenkorb</h2>
					<p>
						Warenwert gesamt:
						<?php
							// alle Artikel aus Datenbank als Objekte einlesen
							$artikelListe = ArtikelMapper::getArtikel();
						
							if((!isset($_SESSION["warenkorb"])) || ($_SESSION['warenkorb']->isEmpty()) ){ 
								echo "0,00 €";
							}else{
								$positionen = $_SESSION['warenkorb']->getPositionen();
								$neupreis = "0,00";
								foreach($positionen as $pos) {
									$preis = $pos->getBetrag();
									$neupreis = $neupreis + $preis;
								}
								$neupreis = number_format($neupreis,2,',','.');
								echo $neupreis." €";
							}
						?>
					</p>
					<nav>
						<a href="warenkorb.php" title="Warenkorb im Detail ansehen">Warenkorb im Detail</a>
						<a href="kasse.php" title="Zur Kasse gehen">Zur Kasse gehen</a>
					</nav>
				</section>

				<?php
					}
				?>
			</aside>
