

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
			// else if($_POST['src'] == 'view_edit') {
			// 	include 'edit_info_modal.php';
			// }
		?>
		
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>