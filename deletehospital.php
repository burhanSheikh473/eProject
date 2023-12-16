<?php
include("connection.php");

$hid= $_GET['id'];
$query = "DELETE FROM tbl_hospital WHERE  Id=$hid";
$result = mysqli_query($con,$query);

if($result) {
    echo "<script>
    window.location.href = 'hospitalstatus.php';
    </script>";
}

?> 