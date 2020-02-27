// modal open
function load_modal(e) {
	var source = e.target.id;
	$.ajax({
		url: "modal.php",
		type: "post",
		data: {src:source},
		success:(function(data){
			$('#modal_spot').toggle();
			$('#modal_spot').html(data);
		}),
		error:function(){
			alert("error");
		},
	});
}
