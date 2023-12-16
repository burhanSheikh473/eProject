<?php
include('connection.php');
session_start();
if(!isset($_SESSION['hos_name'])){
    header('location:hospitallogin.php');
}
$hname = $_SESSION['hospitalname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insert In Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            <h1>COVID CARE</h1>
        </div>
        <hr>
            <ul class="main">
                
                
                <li>
                    <a href="./hospitalpanel/appointmentdetails.php">
                    <i class="fa-solid fa-hospital"></i>
                        <span>Appointment Details</span>
                    </a>
                </li>

                <li>
                    <a href="./hospitalpanel/vaccinationdetails1.php" >
                    <i class="fa-solid fa-virus"></i>
                        <span>Vaccination Details</span>
                    </a>
                </li>
                 <li>
                    <a href="./hospitalpanel/uploadresults.php"  class="active">
                        <i class="glyphicon glyphicon-phone-alt"></i>
                        <span>Upload Results</span>
                    </a>
                </li> 
                <li>
                    <a href="./hospitalpanel/resultstatus.php"  >
                    <i class="fa-solid fa-user"></i>
                        <span>Test/Vaccination Results</span>
                    </a>
                </li>
                
                <!-- <li>
                    <a href="./index.php" >
                    <i class="fa-solid fa-arrow-left"></i>
                        <span>Back To CovidCare</span>
                    </a>
                </li> -->
                
                <li class="logout">
                    <a href="./hospitallogout.php">
                        <i class="glyphicon glyphicon-off"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="header">
                <div class="title">
                    <h2>My Dashboard</h2>
                       <h3><?php echo $hname?> <span>(Hospital Panel:)</span></h3>
                </div>
             
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