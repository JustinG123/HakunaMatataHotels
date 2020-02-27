<!DOCTYPE html>
<!-- 
	The landing page with company logo and the 3 options
-->
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
		
		<div class="main_content">
			<img class="title_image" src="resources/bg.jpg" alt="Hakuna Matata Hotels">
			<h1 class="heading">Hakuna<br>Matata<br>Hotels</h1>
		</div>

		<div class="options">
			<div class="button make_reservation" id="make_reservation">
				Make reservation
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
	<!-- 
		Once an option is clicked the even is sent to a script which sends the
		event to the server using ajax (modal.php) which then opens the relevant
		modal based on what they clicked
	 -->
	<script>
		$(".button").on('click', function(e) {
			load_modal(e);
		});
	</script>
		
</html>