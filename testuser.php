<?php
include("connection.php");
session_start();
$pname = $_SESSION['U_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insert In Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<style>
    .d-btn{
        float: right;
         background-color: #001973; 
         color: white;
         margin-top: 10px;
         padding:10px;
         width: 200px;
         margin-bottom: 5px;
         font-weight: 900;
         border: 0;
         outline: 0;
    }
    .d-btn:hover{
        transition: ease-in all 0.5s;
    color: #fff;
    background-color: #e92f0b;

    }
</style>

<body>
    <div class="sidebar">
        <div class="logo">
        <h1><?php echo $pname?></h1>
        </div>
        <hr>
        <ul class="main">
                
                <li>
                    <a href="patientprofile.php"  >
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
                       <h3>CovidCare (Test/Vaccine Status)</h3>
                </div>
                <!-- <div class="user-info">
                    <img src="./assets/img/logo.png" alt="">
                </div> -->
            </div>
            <div class="table-container">
            <table border="1">
    <thead>
        <Button class="d-btn"><a href="file/report.xlsx" >Download Report </a></Button>
        <tr>
            <th>ID</th>
            <th>Patient-Name</th>
            <th>Patient-Contact</th>
            <th>Vaccine-Status</th>
            <th>Test-Result</th>
            <th>Test-Date</th>
        </tr>
    </thead>
    <tbody>
</div>
<?php
$query = "SELECT * FROM tbl_status WHERE PatientName = '$pname'";

$result = mysqli_query($con,$query);
foreach($result as $vtid){
echo"<tr>";
echo "<td>$vtid[Id]</td>";
echo "<td>$vtid[PatientName]</td>";
echo "<td>$vtid[PatientContact]</td>";
echo "<td>$vtid[VaccineStatus]</td>";
echo "<td>$vtid[TestResult]</td>";
echo "<td>$vtid[TestDate]</td>";

                
}

?>