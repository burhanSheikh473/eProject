<?php
include('connection.php');
session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:loginuser.php');
    exit();
}
;
$pname = $_SESSION['U_name'];
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
    <div class="sidebar">
        <div class="logo">
            <h1>
                <?php echo $pname ?>
            </h1>
        </div>
        <hr>
        <ul class="main">



            <li class="logout">
                <a href="patientprofile.php">
                    <i class="glyphicon glyphicon-off"></i>

                </a>
            </li>
        </ul>
    </div>



    <div class="main-content">
        <div class="header">
            <div class="title">
                <h2>My Dashboard</h2>
                <h3>Covid Care (Appointment History:)</h3>
            </div>
            <!-- <a href="#" class="logout">
                        <i class="glyphicon glyphicon-off"></i>
                        <span>Logout</span>
                    </a> -->
        </div>
        <div class="table-container">
            <table border=1>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User-Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Category</th>
                        <th>Hos-Name</th>
                        <th>Vac-Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $query = "SELECT * FROM tbl_appointment ";
                    $query = "SELECT * FROM tbl_appointment INNER JOIN tbl_hospital ON tbl_appointment.h_id = tbl_hospital.Id WHERE PatientName = '$pname' ";

                    $result = mysqli_query($con, $query);
                    foreach ($result as $apid) {
                        echo "<tr>";
                        echo "<td>$apid[Id]</td>";
                        echo "<td>$apid[PatientName]</td>";
                        echo "<td>$apid[Contact]</td>";
                        echo "<td>$apid[Email]</td>";
                        echo "<td>$apid[Date]</td>";
                        echo "<td>$apid[Time]</td>";
                        echo "<td>$apid[Category]</td>";
                        echo "<td>$apid[Name]</td>";
                        echo "<td>$apid[VaccineName]</td>";






                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>

</html>