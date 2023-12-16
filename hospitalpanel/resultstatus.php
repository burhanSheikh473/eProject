<?php
include('../connection.php');
session_start();
$hname = $_SESSION['hospitalname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insert In Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../style2.css">
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
                    <a href="../hospitalpanel.php"  >
                    <i class="glyphicon glyphicon-circle-arrow-left"></i>
                        <span>Back</span>
                    </a>
                </li>

</ul>
        </div>
        
        <div class="main-content">
            <div class="header">
                <div class="title">
                    <h2>My Dashboard</h2>
                       <h3><?php echo $hname?>(Test/Vaccine Status)</h3>
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
            <th>Patient-Name</th>
            <th>Patient-Contact</th>
            <th>Vaccine-Status</th>
            <th>Test-Result</th>
            <th>Modify</th>
        </tr>
    </thead>
    <tbody>
</div>
<?php
$query = "SELECT * FROM tbl_status";

$result = mysqli_query($con,$query);
foreach($result as $vtid){
echo"<tr>";
echo "<td>$vtid[Id]</td>";
echo "<td>$vtid[PatientName]</td>";
echo "<td>$vtid[PatientContact]</td>";
echo "<td>$vtid[VaccineStatus]</td>";
echo "<td>$vtid[TestResult]</td>";
echo "<td>
                
                <button class='delete-button'><a href='deleteresults.php?id=$vtid[Id]'>Delete</a></button>
                
                <button class='update-button'><a href='updateresults.php?identity=$vtid[Id]&patientname=$vtid[PatientName]&patientcontact=$vtid[PatientContact]&vaccinestatus=$vtid[VaccineStatus]&testresult=$vtid[TestResult]'>Update</a></button>


                </td>";
                
}

?>