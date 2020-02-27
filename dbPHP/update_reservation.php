<?php
	// Update SQL for the "Edit reservation" modal
	require_once('connect.php');

	function update_sql($sql, $conn) {
		if ($conn->query($sql) === TRUE) {
			return 1;
		} else {
			return 0;
		}

	}

	$sql = "UPDATE guest SET
				name = \"{$_POST["fname"]}\",
				surname = \"{$_POST["lname"]}\",
				email_address = \"{$_POST["email"]}\",
				phone_number = \"{$_POST["contact"]}\"
				WHERE guest_id = {$_POST["gu_id"]}
			";

	if(update_sql($sql, $conn) == 0) {
		echo 998;
		return;
	}

	$sql = "UPDATE reservation SET
		check_in_date = \"{$_POST["check_in"]}\",
		check_out_date = \"{$_POST["check_out"]}\"
		WHERE id = {$_POST["res_id"]}
	";

	if(update_sql($sql, $conn) == 0) {
		echo 998;
		return;
	}

	echo 1

?>