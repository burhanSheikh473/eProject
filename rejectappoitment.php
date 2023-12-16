<?php
include("connection.php");
$id = $_GET['id'];
// echo $_GET['id'];
$query = "UPDATE tbl_appointment SET Status=0 WHERE Id=$apid";
$result = mysqli_query($con,$query);
header("location:appointmentdetails");

?>