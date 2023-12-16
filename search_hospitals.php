<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Sanitize the input to prevent SQL injection
    $cleanSearchTerm = mysqli_real_escape_string($con, $searchTerm);

    // Your SQL query to search for hospitals
    $sql = "SELECT * FROM tbl_hospital WHERE Name LIKE '%$cleanSearchTerm%' OR Contact LIKE '%$cleanSearchTerm%'";
    $result = $con->query($sql);
    

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="hospital-item">';
            echo '<a href="hospital_details.php?id=' . $row["Id"] . '">' . $row["Name"] . '</a><br>';
            echo 'Email: ' . $row["Email"] . '<br>';
            echo '</div>';
        }
    } else {
        echo "No results found";
    }
}
?>

