	<?php include "template/head.php" ?>

	<body>
		<div class="header mb-4">
			<?php include "template/navbar.php" ?>
		</div>
		<div class="container" id="container">
		</div>
		<div class="text fs-2 d-flex justify-content-center align-item-center text-center mb-2">
			<p class="text-type">Caeser-Cipher Encryption & Decryption</p>
		</div>

		<div class="form p-5 d-flex justify-content-center align-item-center">
			<form class="p-4 border border-3" id="caser-form" style="width: 70%;" action="SaveItToFile/CAESER.php" method="POST">
				<label class="form-label" for="caser-msg">Text:</label>
				<input class="form-control" name="message" id="caser-msg" type="text" placeholder="Welcome in Cryptolio NCTU.">
				<label class="form-label" for="caser-shift">Shift:</label>
				<input class="form-control" name="shift" id="caser-shift" type="number" value="13">
				<input class="btn btn-primary mt-2" type="button" value="Encrypt" onclick="doCrypt(false);">
				<input class="btn btn-success mt-2" type="button" value="Decrypt" onclick="doCrypt(true);">
				<input class="btn btn-info mt-2" type="submit" name="submit" value="Save as file">
				<input class="btn btn-danger mt-2" type="button" value="Crack Cipher" onclick="window.location.href='caser crack.php';">

			</form>
		</div>
		<?php include "template/footer.php"; ?>