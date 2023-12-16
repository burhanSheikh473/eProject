<?php
include("connection.php");

$apid= $_GET['id'];
$query   = "DELETE FROM tbl_appointment WHERE `tbl_appointment`.`h_id` = '$apid'";
$result = mysqli_query($con,$query);

if($result) {
    echo "<script>
    window.location.href = 'appointmentdetails.php';
    </script>";
}

?>