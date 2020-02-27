<?php

include 'connect.php';
// var_dump($conn);

$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		// echo $row["check_in_date"];
    }
} else {
    echo "0 results";
}


$conn->close();

?>