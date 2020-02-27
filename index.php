<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hakuna Matata Hotels</title>

	<!-- JQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet" href="resources/main.css">
	<link rel="stylesheet" href="resources/modal.css">

</head>
	<body>
		<?php //include 'make_modal.php';?>
		<?php //include 'view_modal.php';?>
		<?php //include 'edit_modal.php';?>
		
		<div class="main_content">
			<!-- <h1 class="heading">Hakuna Matata Hotels</h1> -->
			<img class="title_image" src="resources/bg.jpg" alt="Hakuna Matata Hotels">
			<h1 class="heading">Hakuna<br>Matata<br>Hotels</h1>
		</div>

		<div class="options">
			<div class="button make_reservation" id="make_reservation">
				Make reservation
				<?php // include 'test.php'; ?>
			</div>
			<div class="button edit_reservation" id="edit_reservation">
				Edit reservation
			</div>
			<div class="button view_reservation" id="view_reservation">
				View reservation
			</div>
		</div>

		<div id="modal_spot">
		</div>
	</body>

	<script src="js/scripts.js"></script>
	<script>
		$(".button").on('click', function(e) {
			load_modal(e);
		});
	</script>
		
</html>