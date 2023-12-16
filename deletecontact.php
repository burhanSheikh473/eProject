<?php
include("connection.php");

$pid= $_GET['id'];
$query = "DELETE FROM tbl_contact WHERE  Id=$pid";
$result = mysqli_query($con,$query);

if($result) {
    echo "<script>
    window.location.href = 'contactdetails.php';
    </script>";
}

?> 