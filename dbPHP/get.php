
<?php

	// Read All information from a given table
	function read_all($table) {
		require 'connect.php';

		$sql = "SELECT * FROM $table";
		$result = $conn->query($sql);
		$data = array();

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($data, $row);
			}
		} else {
			echo "0 results";
		}

		$conn->close();

		return $data;
	}
?>