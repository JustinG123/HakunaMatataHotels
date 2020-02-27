
<!--
	This is where the user is redirected when they click
	"Edit Reservation" it consists of a table populated by
	all reservatiions in the database
-->

<div id="edit_content">
	<h3 class="modal_title">Edit Reservation (Select row to edit)</h3>
	<hr class="modal_rule">

		<table class="scroll_bar table_max" id="view_table_data">
			<!-- Populated by ajax and php (view_edit_table.php) -->
		</table>


	<hr class="modal_rule">
	<button class="close_btn modal_btn" id="close_btn" onClick="$('#modal_spot').toggle();">Close</button>
</div>

<script>
	$(document).ready(function(){
		// Populated the above table with all reservations in the database
		let source = "";
		$.ajax({
			url: "dbPHP/view_edit_table.php",
			type: "post",
			data: {src:source},
			success:(function(data){
				// console.log(data);
				$('#view_table_data').html(data);
			}),
			error:function(){
				alert("error");
			},
		});

		// Allows the rows of the table to be clickable for editing
		$(document).on("click", ".select_row" , function(e) {
			var curr_row = [];
			for(const row of e['currentTarget']['cells']) {
				curr_row.push(row['innerHTML']);
			}
			curr_row.push(e['currentTarget']['id']);
			curr_row.push(e['currentTarget']['attributes'][1]['value']);
			load_edit_modal(curr_row);
        });
	})

	// Sets the room description field
	function select_room() {
		var room_id = $("#room option:selected").attr("alt");
		$("#descr").val(room_id);
	}

	// When the user clicks a row this will load a form with the 
	// information from the clcked row for editing
	function load_edit_modal(row_data) {
		$.ajax({
			url: "edit_info_modal.php",
			type: "POST",
			data: {res_data:row_data},
			success:(function(data){
				$('#edit_content').html(data);

				// Fill in all the users information
				$('#fname').val(row_data[0]);
				$('#lname').val(row_data[1]);
				$('#contact').val(row_data[2]);
				$('#email').val(row_data[3]);
				$('#check_in').val(row_data[5]);
				$('#check_out').val(row_data[6]);
				$('#res_id').val(row_data[7]);
				$('#gu_id').val(row_data[8]);
				select_room();
			}),
			error:function(){
				alert("error");
			},
		});
	}
</script>