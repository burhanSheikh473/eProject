<?php
include("connection.php");
$id = $_GET['id'];
// echo $_GET['id'];
$query = "UPDATE tbl_vaccines SET Status=0 WHERE Id=$id";
$result = mysqli_query($con,$query);
header("location:vaccinationdetails.php");

?>