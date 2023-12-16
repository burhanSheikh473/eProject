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
<body>
    
            <!-- Add View Status Button -->
        

    <div class="main-content">
        <div class="header">
            <div class="title">
                <h2>My Dashboard </h2>

                
                <h3><?php echo $aname ?> (Patient Status)</h3>
            </div>
        </div>
        <div class="table-container">
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User-Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Active/Deactivate</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tbl_patient";
                    $result = mysqli_query($con, $query);
                    foreach ($result as $pid) {
                        echo "<tr>";
                        echo "<td>$pid[Id]</td>";
                        echo "<td>$pid[Name]</td>";
                        echo "<td>$pid[Email]</td>";
                        echo "<td>$pid[Contact]</td>";
                        echo "<td>$pid[Password]</td>";
                        echo "<td>$pid[Status]</td>";
                        echo "<td>";

                        if ($pid['Status'] == 1) {
                            echo "<a href='deactivatepatient.php?id=$pid[Id]'>
                            <button class='deactive-button'>Deactive</button>
                            </a>";
                        } else {
                            echo "<a href='activatepatient.php?id=$pid[Id]'>
                            <button class='active-button'>Active</button>
                            </a>";
                        }

                        echo "<td>
                            <button class='delete-button'><a href='deletepatient.php?id=$pid[Id]'>Delete</a></button>
                            <button class='update-button'><a href='updatepatient.php?identity=$pid[Id]&patientname=$pid[Name]&patientemail=$pid[Email]&patientcontact=$pid[Contact]&patientpassword=$pid[Password]'>Update</a></button>
                            </td>";

                        "</td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
