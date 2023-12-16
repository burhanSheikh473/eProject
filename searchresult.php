<?php
include("connection.php");
// Fetch data from tbl_hospitals
$sql = "SELECT * FROM tbl_status";
$result = $con->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close connection
$con->close();

// Return data as JSON
echo json_encode(array("data" => $data));
?>
