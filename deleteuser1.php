<?php
include("connection.php");

$vtid= $_GET['id'];
$query = "DELETE FROM tbl_status WHERE  Id=$vtid";
$result = mysqli_query($con,$query);

if($result) {
    echo "<script>
    window.location.href = 'resultstatus1.php';
    </script>";
}

?> 