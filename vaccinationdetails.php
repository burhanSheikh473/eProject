<?php
include("connection.php");
session_start();
$aname = $_SESSION['adminname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insert In Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="./style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<style>
</style>

<body>
    <!-- sidebar start -->
    <?php
    require_once('sidebar.php');
    ?>
    <!-- sidebar end -->
    <style>
    h2 {
        margin-left: 400px;
    }
</style>

    <div class="main-content">
        <div class="header">
            <div class="title">
                <h2>My Dashboard</h2>
                <h3>
                    <?php echo $aname ?>(Vaccination details)
                </h3>
            </div>
            <!-- <div class="user-info">
                    <img src="./assets/img/logo.png" alt="">
                </div> -->
        </div>
        <div class="table-container">
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vaccine-Name</th>
                        <th>Vaccine Code</th>
                        <th>Status</th>
                        <th>availability</th>
                        <th>Modify</th>

                    </tr>
                </thead>
                <tbody>
        </div>
        <?php
        $query = "SELECT * FROM tbl_vaccines";

        $result = mysqli_query($con, $query);
        foreach ($result as $vid) {
            echo "<tr>";
            echo "<td>$vid[Id]</td>";
            echo "<td>$vid[VaccineName]</td>";
            echo "<td>$vid[VaccineCode]</td>";
            echo "<td>$vid[Status]</td>";
            echo "<td>$vid[Availability]</td>";
        
            echo "<td>";

   
            echo "<td>
                
                <button class='delete-button'><a href='deletevaccine.php?id=$vid[Id]'>Delete</a></button>
                

                <button class='update-button'><a href='updatevaccines.php?identity=$vid[Id]&vaccinename=$vid[VaccineName]&vaccinecode=$vid[VaccineCode]'>Update</a></button>

                </td>";
            "</td>";




        }
        ?>