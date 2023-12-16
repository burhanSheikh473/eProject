<?php
include("connection.php");
$id = $_GET['id'];
// echo $_GET['id'];
$query = "UPDATE tbl_patient SET Status=1 WHERE Id=$id";
$result = mysqli_query($con,$query);
header("location:userstatus.php");

?>