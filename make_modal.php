
<h3 class="modal_title">New reservation</h3>
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
					include 'dbPHP/get.php';

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
	<button type="submit" class="modal_btn" id="submit_btn" disabled>Submit</button>
</form> 

<script>
$("input").focusout(function() {
	if(validateContact($("#contact")[0].value) && validateEmail($("#email")[0].value)) {
		$("#submit_btn").attr('disabled', false);
	}
	else {
		$("#submit_btn").attr('disabled', true);
	}

	var check_in = document.getElementById("check_in").value;
	var check_out = document.getElementById("check_out").value;
	$("#check_out").attr('min', check_in)

	if(check_out < check_in) {
		$("#check_out").attr('value', check_in)
	}

})

function select_room() {
	// var room_id = document.getElementById("room").value;
	var room_id = $("#room option:selected").attr("alt");
	$("#descr").val(room_id);

}

//Regex to remove funky characters from contact then checks it has 10 numbers
function validateContact(contactNum) {
	contactNum = contactNum.replace(/\s|-/g,'');
	return (contactNum.length == 10 ? true : false);
}


//Regex for emails
function validateEmail(emailAddr) {
	var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return regex.test(emailAddr);
}

$(document).ready(function(){
	var today = new Date();

	var month = (today.getMonth() + 1).toString();
	if(month.length == 1) {
		month = '0' + month
	}

	var day_in = today.getDate().toString();
	if(day_in.length == 1) {
		day_in = '0' + day_in
	}

	var day_out = (today.getDate() + 1).toString();
	if(day_out.length == 1) {
		day_out = '0' + day_out
	}

	var date = (today.getFullYear()) + '-' + month + '-' + day_in;
	$("#check_in").attr('value', date);
	$("#check_in").attr('min', date);

	var date = (today.getFullYear()) + '-' + month + '-' + day_out;
	$("#check_out").attr('value', date);
	$("#check_out").attr('min', date);

	var room_id = $("#room option:selected").attr("alt");
	$("#descr").val(room_id);

	//AJAX write to DB
	$("#new_reservation_form").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var url = form.attr('action');

		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(),
			success: function(data)
			{

				// console.log(data);
				//Successful booking
				if(data == 1) {
					$('#modal_spot').toggle();
					alert("Reservation successfully booked");
				}
				//Room is booked
				else if(data == 999) {
					alert("This room is booked during that period");
				}
				//Database fail
				else if(data == 998) {
					alert("Failed to write to database");
				}
			}
		});
	});



	//DELETE (Fills in test data to form)
	$("#fname").val("Fred");
	$("#lname").val("Fredson");
	$("#email").val("Fred@Fredson.com");
	$("#contact").val("2323232323");

	if(validateContact($("#contact")[0].value) && validateEmail($("#email")[0].value)) {
		$("#submit_btn").attr('disabled', false);
	}
	else {
		$("#submit_btn").attr('disabled', true);
	}
})
</script>