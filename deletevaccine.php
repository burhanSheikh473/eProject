<?php
include("connection.php");

$vid= $_GET['id'];
$query = "DELETE FROM tbl_vaccines WHERE  Id=$vid";
$result = mysqli_query($con,$query);

if($result) {
    echo "<script>
    window.location.href = 'vaccinationdetails.php';
    </script>";
}

?> 