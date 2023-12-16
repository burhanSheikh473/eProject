<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:loginuser.php');
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

            <li>
                <a href="patientupdate.php">
                    <i class="fa-solid fa-virus"></i>
                    <span>Update Profile</span>
                </a>
            </li>

            <li>
                <a href="patientapp.php" class="active">
                    <i class="fa-solid fa-phone"></i>
                    <span>My Appointment</span>
                </a>
            </li>
            <!-- <li>
                    <a href="./userstatus.php"  >
                    <i class="fa-solid fa-user"></i>
                        <span>User Status</span>
                    </a>
                </li>

                <li>
                    <a href="./hospitalstatus.php" >
                    <i class="fa-solid fa-hospital-user"></i>
                        <span>Hospital Status</span>
                    </a>
                </li>
                
                <li>
                    <a href="./appointmentdetails.php" >
                    <i class="fa-solid fa-hospital"></i>
                        <span>Appointment Details</span>
                    </a>
                </li> -->





            <li>
                <a href="testuser.php">
                    <i class="fa-solid fa-hospital"></i>
                    <span>Test/Vaccine Results</span>
                </a>
            </li>


            <li class="logout">
                <a href="index.php">
                    <i class="glyphicon glyphicon-off"></i>

                </a>
            </li>
        </ul>
    </div>



    <div class="main-content">
        <div class="header">
            <div class="title">
                <h2>My Dashboard</h2>
                <h3>Covid Care (User Panel:)</h3>
            </div>
            <a href="#" class="logout">
                <i class="glyphicon glyphicon-off"></i>
                <span>Logout</span>
            </a>
        </div>
        <div class="table-container">
            <table border=1>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User-Name</th>
                        <th>User-Email</th>
                        <th>City</th>
                        <th>Message</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
</body>

</html>