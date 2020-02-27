
<h3 class="modal_title">View Reservations</h3>
<hr class="modal_rule">

<div id="search_content">
	<form id="search_form" action="dbPHP/search.php">
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
		</div>

		<hr class="modal_rule">
		<button type="button" class="modal_btn close_btn" id="close_btn" onClick="$('#modal_spot').toggle();">Close</button>
		<button type="submit" class="modal_btn" id="submit_btn">Search</button>
	</form> 
</div>

<script>
	$("#search_form").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var url = form.attr('action');

		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(),
			success: function(data)
			{
				$('#search_content').html(data);
			},
			error:function(){
				alert("error");
			},
		});
	});
</script>