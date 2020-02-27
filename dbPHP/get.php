
<?php

	function read_all($column) {
		require 'connect.php';

		$sql = "SELECT * FROM $column";
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