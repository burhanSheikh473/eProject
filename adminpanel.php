<?php
session_start();
if  (!isset($_SESSION['Admin_name']) ) {
    header('location:adminlogin.php');
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
    
    <!-- sidebar start -->
    <?php
    require_once('sidebar.php');
    ?>
    <!-- sidebar end -->


    <div class="main-content">
        <div class="header">
            <div class="title">
                <h2>My Dashboard</h2>
                <h3>
                    <?php echo $aname ?> (Admin Panel:)
                </h3>
            </div>
            <a href="./adminlogout.php" class="logout">
                <i class="glyphicon glyphicon-off"></i>
                <span>Logout</span>
            </a>
        </div>

        <div class="box-container">

            <div class="box">

                <i class="fa-solid fa-hospital"></i>

                <?php
                include('connection.php');
                $query = "SELECT Id FROM tbl_hospital ORDER BY Id";
                $result = mysqli_query($con, $query);

                $row = mysqli_num_rows($result);


                ?>
                <h1>
                    <?php echo $row ?>
                </h1>
                <h3 class="title">All Hospitals</h3>
                <!-- <a href="./newcourier.php" class="inline-btn">view</a> -->

            </div>

            <div class="box">
                <i class="fa-solid fa-user-plus"></i>
                <?php
                include('connection.php');
                $query = "SELECT Id FROM tbl_admin ORDER BY Id";
                $result = mysqli_query($con, $query);

                $row = mysqli_num_rows($result);


                ?>
                <h1>
                    <?php echo $row ?>
                </h1>
                <h3 class="title">Admin</h3>
            </div>

            <div class="box">
                <i class="fa-solid fa-user"></i>
                <?php
                include('connection.php');
                $query = "SELECT Id FROM tbl_patient ORDER BY Id";
                $result = mysqli_query($con, $query);

                $row = mysqli_num_rows($result);


                ?>
                <h1>
                    <?php echo $row ?>
                </h1>
                <h3 class="title">Patient Status</h3>
            </div>

            <div class="box"> 
                <i class="fa-solid fa-hospital-user"></i>
                <?php
                include('connection.php');
                $query = "SELECT ID FROM tbl_appointment ORDER BY ID";
                $result = mysqli_query($con, $query);

                $row = mysqli_num_rows($result);


                ?>
                <h1>
                    <?php echo $row ?>
                </h1>
          
            </div>

            <div class="box"> 
                <i class="fa-solid fa-virus"></i>

                <?php

                $query = "SELECT Id FROM tbl_vaccines ORDER BY Id";
                $result = mysqli_query($con, $query);

                $row = mysqli_num_rows($result);


                ?>
                <h1>
                    <?php echo $row ?>
           
                 <h3 class="title">Vaccines</h3>
             </div>
  
            <div class="box">
                 <i class="fa-solid fa-viruses"></i>



    


          
                <h1>
                    <?php echo $row ?>
                </h1> 
                <h3 class="title">Patient Vaccines Status</h3>
            </div>


     
             <div class="box">
                        <i class="fa-solid fa-phone"></i>


                        <?php
                include('connection.php');
          
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result))
        
                

                ?>

                    <?php echo $row ?>
                   </h1>
                        <h3 class="title">Message Status</h3>
                </div>
        
</body>

</html>