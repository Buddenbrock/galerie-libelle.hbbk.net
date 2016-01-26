<?php
	include_once "include/head.php";
?>


	<h1>Kontakt</h1>
	<?php
		include_once "include/aside.php";
	?>

	<section class="main konto">
		<form action="include/webmailer.php" method="POST">
			<label for="name">Name</label>
			<input type="text" name="name" placeholder="Max Mustermann"/>
			<label for="mail">E-Mail</label>
			<input type="email" name="mail" placeholder="max@mustermann.de"/>
			<br/>
			<label for="nachricht">Ihre Nachricht</label>
			<textarea name="nachricht"></textarea>
			<input type="submit" name="absenden" value="Absenden" />
		</form>
	</section>


<?php
	include_once "include/foot.php";
?>