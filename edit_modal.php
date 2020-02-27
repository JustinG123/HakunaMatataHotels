
<div id="edit_content">
	<h3 class="modal_title">Edit Reservation (Select row to edit)</h3>
	<hr class="modal_rule">

		<table class="scroll_bar table_max" id="view_table_data">
			<!-- Populated by ajax and php -->
		</table>


	<hr class="modal_rule">
	<button class="close_btn modal_btn" id="close_btn" onClick="$('#modal_spot').toggle();">Close</button>
</div>

<script>
	$(document).ready(function(){

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

		$(document).on("click", ".select_row" , function(e) {
			// console.log(e['currentTarget']['id']);
			load_edit_modal(e['currentTarget']['id']);
        });
	})

	function load_edit_modal(row_id) {
		$.ajax({
			url: "edit_info_modal.php",
			type: "POST",
			data: {res_id:row_id},
			success:(function(data){
				$('#edit_content').html(data);
			}),
			error:function(){
				alert("error");
			},
		});
	}

	// $(".select_row").on('click', function(e) {
	// 	console.log(e);
	// });
</script>