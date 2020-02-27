
<?php

	require_once('connect.php');

	function sql_query($sql, $conn) {
		$result = $conn->query($sql);
		$res = array();

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($res, $row);
			}
		} else {
			return null;
		}

		return $res;
	}

	$data = $_POST;
	$sql = "Select g.name, g.surname, g.phone_number, g.email_address, ro.room_num, r.check_in_date, r.check_out_date, r.id
					From reservation r 
					INNER JOIN guest g on r.guest_id = g.guest_id
					INNER JOIN rooms ro on r.room_id = ro.room_id 
					WHERE true ";

	if($data['fname'] != "") {
		$sql .= "AND g.name = \"{$data['fname']}\" ";
	}

	if($data['lname'] != "") {
		$sql .= "AND g.surname = \"{$data['lname']}\" ";
	}

	if($data['email'] != "") {
		$sql .= "AND g.email_address = \"{$data['email']}\" ";
	}

	if($data['contact'] != "") {
		$sql .= "AND g.phone_number = \"{$data['contact']}\" ";
	}

	// print_r($sql);
	$sql_result = sql_query($sql, $conn);

	$table = "
		<table class=\"scroll_bar table_max\" id=\"view_table_data\">
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Phone Number</th>
				<th>Email Address</th>
				<th>Room Number</th>
				<th>Check In</th>
				<th>Check Out</th>
			</tr>
	";

	foreach($sql_result as $row) {
		$row_id = array_pop($row);
		$table .= "<tr id=\"$row_id\" class=\"select_row\">";
		foreach($row as $item) {
			$table .= "<td>$item</td>";
		}
		$table .= "</tr>";
	}

	$table .= "
		</table>
	";

	echo $table;
?>

<hr class="modal_rule">
<button type="button" class="modal_btn close_btn" id="close_btn" onClick="$('#modal_spot').toggle();">Close</button>