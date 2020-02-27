<!--
	Opens the relevant modal based on the option the user selected
-->
<div id="modal" class="modal">
	<div class="modal-content">

		<?php
			if($_POST['src'] == 'make_reservation') {
				include 'make_modal.php';
			}
			else if($_POST['src'] == 'view_reservation') {
				include 'view_modal.php';
			}
			else if($_POST['src'] == 'edit_reservation') {
				include 'edit_modal.php';
			}
		?>
		
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>