<?php
	require_once('connect.php');

	// Returns the first value found in the database
	function sql_one($sql, $conn) {
		$result = $conn->query($sql);
		$res = "";

		if ($result->num_rows > 0) {
			$res = $result->fetch_assoc();
		} else {
			return null;
		}

		return $res;
	}

	// Writes the given SQL query to the database
	function write_sql($sql, $conn) {
		if ($conn->query($sql) === TRUE) {
			return 1;
		} else {
			return 0;
		}

	}

	// Returns all values matching the query in the database
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

	// check_in <= db_check_out
	// check_out >= db_check_in

	// Detectes overlap between 2 given date ranges
	// Returns 1 if there is overlap and 0 if there is no overlap
	function datesOverlap($s_date_one, $e_date_one, $s_date_two, $e_date_two) {

		if($s_date_one <= $e_date_two && $e_date_one >= $s_date_two) {
			return 1;
		}
	 
		return 0;
	}



	$data = $_POST;
	$guest = "";

	//Check if room is booked or not
	$sql = "SELECT * FROM reservation WHERE room_id = {$data["room"]}";
	$avaliability = sql_query($sql, $conn);

	$overlap = datesOverlap($data['check_in'], $data['check_out'], $avaliability[0]['check_in_date'], $avaliability[0]['check_out_date']);

	if($overlap) {
		echo 999;
		return;
	}

	// Check if person exists, if no create them
	$sql = "SELECT * FROM guest WHERE name = \"{$data["fname"]}\" AND surname = \"{$data["lname"]}\" 
			AND email_address = \"{$data["email"]}\" AND phone_number = \"{$data["contact"]}\"";
	$person = sql_one($sql, $conn);

	// If person does not exist, summon them into existance
	if($person == "") {
		$sql = "INSERT INTO guest (name, surname, email_address, phone_number)
				VALUES (\"{$data["fname"]}\", \"{$data["lname"]}\", \"{$data["email"]}\", \"{$data["contact"]})\"";
		print_r($sql);
		if(write_sql($sql, $conn) == 0) {
			echo 998;
			return;
		}

		$sql = "SELECT * FROM guest WHERE name = \"{$data["fname"]}\" AND surname = \"{$data["lname"]}\" 
			AND email_address = \"{$data["email"]}\" AND phone_number = \"{$data["contact"]}\"";
		$person = sql_one($sql, $conn);
	}

	// Now book the period and room for the person
	$sql = " INSERT INTO reservation
			(check_in_date, check_out_date, guest_id, room_id)
			VALUES (\"{$data["check_in"]}\", \"{$data["check_out"]}\", {$person["guest_id"]}, {$data["room"]})";
	
	if(write_sql($sql, $conn) == 0) {
		echo 998;
		return;
	}

	
	$conn->close();
	echo 1;
?>


