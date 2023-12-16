<?php
include('connection.php');
session_start();
if (!isset($_SESSION['hos_name'])) {
    header('');
}
;
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
    <?php
        require_once 'sidebar.php';
    ?>
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
                    <?php echo $aname ?> (contact details)
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
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Message</th>
                
                        <th>Delete</th>
                        <th>Update</th>

                    </tr>
                </thead>
                <tbody>
        </div>

        <style>
            /* ... Your existing styles ... */

            .add-contact-button {
                background-color: #3498db;
                /* Change this color code to your desired color */
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-bottom: 20px;
                cursor: pointer;
                border-radius: 5px;
            }

            /* ... Your existing styles ... */
        </style>


        <?php
        $query = "SELECT * FROM tbl_contact";

        $result = mysqli_query($con, $query);
        foreach ($result as $cid) {
            echo "<tr>";
            echo "<td>$cid[Id]</td>";
            echo "<td>$cid[Name]</td>";
            echo "<td>$cid[Contact]</td>";
            echo "<td>$cid[Email]</td>";
            echo "<td>$cid[Message]</td>";
            
            echo "<td><button class='delete-button'><a href='deletecontact.php?id=$cid[Id]'>Delete</a></button></td>";
            echo "<td><button class='update-button'><a href='updatecontact.php?id=$cid[Id]'>update</a></button></td>";
           
            // Add Contact Button for each row
           
           


        }
        ?>