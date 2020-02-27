<?php
	// Loads the table with selectable rows to edit in the "Edit reservation" modal
	require 'connect.php';

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

	$sql = "
		Select g.name, g.surname, g.phone_number, g.email_address, ro.room_num, r.check_in_date, r.check_out_date, r.id, g.guest_id
			From reservation r 
			INNER JOIN guest g on r.guest_id = g.guest_id
			INNER JOIN rooms ro on r.room_id = ro.room_id
			ORDER BY ro.room_num, r.check_in_date
	";
	$data = sql_query($sql, $conn);

	$table = "
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

	foreach($data as $row) {
		$guest_id = array_pop($row);
		$row_id = array_pop($row);
		$table .= "<tr id=\"$row_id\" data_guestid=\"$guest_id\" class=\"select_row\">";
		foreach($row as $item) {
			$table .= "<td>$item</td>";
		}
		$table .= "</tr>";
	}

	echo $table;
?>