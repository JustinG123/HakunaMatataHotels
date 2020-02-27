<h3 class="modal_title">Edit Selected Reservation</h3>
<hr class="modal_rule">

<form id="new_reservation_form" action="dbPHP/new_reservation.php">
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
						echo "<option value=$room_id alt=\"$room_descr\">Room $room_no</option>";
					}
				?>
			</select>
			<br>
			<label for="descr">Room Description:</label><br>
			<input type="text" id="descr" name="descr" disabled>
		</div>

	</div>

	<hr class="modal_rule">
	<button type="button" class="modal_btn close_btn" id="close_btn" onClick="$('#modal_spot').toggle();">Close</button>
	<button type="submit" class="modal_btn" id="submit_btn" disabled>Update</button>
</form> 