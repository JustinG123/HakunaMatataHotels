<!-- 
	Once a row is selected from the "Edit reservation" modal
	this is where the user is redirected to actually edit
	the information

	It consists of a form with the users original information
	pre-filled in and the user can then edit this information
	and press update to update the Database information
	or click cancel to cancel
-->

<h3 class="modal_title">Edit Selected Reservation</h3>
<hr class="modal_rule">

<form id="edit_reservation_form" action="dbPHP/update_reservation.php">
	<div class="padding_bottom">
		<div class="float_left">
			<label for="fname">First name:</label><br>
			<input type="text" id="fname" name="fname" placeholder="Bob"><br>
			<label for="email">Email address:</label><br>
			<input type="text" id="email" name="email" placeholder="Bob@Bobson.com"><br><br>
		</div>

		<div>
			<label for="lname">Last name:</label><br>
			<input type="text" id="lname" name="lname" placeholder="Bobson"><br>
			<label for="contact">Contact number:</label><br>
			<input type="text" id="contact" name="contact" placeholder="079 123 4657"><br><br>
		</div>

		<div class="float_left">
			<label for="check_in">Check-in date:</label><br>
			<input type="date" id="check_in" name="check_in"><br>
			<label for="check_out">Check-out date:</label><br>
			<input type="date" id="check_out" name="check_out" min="01-01-2020"><br><br>
		</div>

		<div>
			<label for="room">Room number:</label><br>

			<select id="room" name="room" onchange="select_room()">
				<?php 
					include "dbPHP/get.php";

					$rooms = read_all("rooms");
					// print_r($rooms);
					foreach($rooms as $room) {
						$room_id = $room["room_id"];
						$room_no = $room["room_num"];
						$room_descr = $room["description"];
						$selected = "";
						($room_no === $_POST['res_data'][4]) ? $selected = "Selected" : $selected = "";
							
						echo "<option value=$room_id alt=\"$room_descr\" $selected>Room $room_no</option>";
					}
				?>
			</select>
			<br>
			<label for="descr">Room Description:</label><br>
			<input type="text" id="descr" name="descr" disabled>
		</div>

		<input type="hidden" id="res_id" name="res_id">
		<input type="hidden" id="gu_id" name="gu_id">

	</div>

	<hr class="modal_rule">
	<button type="button" class="modal_btn close_btn" id="close_btn" onClick="$('#modal_spot').toggle();">Close</button>
	<button type="submit" class="modal_btn" id="submit_btn">Update</button>
</form>

<script>
	// Ajax query tto call "update_reservation" to update the database
	// with the new information given in the form
	$("#edit_reservation_form").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var url = form.attr('action');

		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(),
			success: function(data)
			{

				//Successful booking
				if(data == 1) {
					$('#modal_spot').toggle();
					alert("Reservation successfully booked");
				}
				//Database fail
				else if(data == 998) {
					alert("Failed to write to database");
				}
			}
		});
	});
</script>