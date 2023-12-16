<?php
include("../connection.php");
session_start();
// if(session_start()=== PHP_SESSION_NONE){
//     session_start();
// }
// if(!isset($_SESSION['hospital_name'])){

// }
// $hospitalName = $_SESSION['hospital_name'];
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
                       <h3><?php echo $hname?> (Appointment details)</h3>
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
            <th>Contact</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Category</th>
            <th>Vaccine Name</th>
            <th>Status</th>
            <th>Approve/Reject</th>
            <th>Upload Results</th>
        </tr>
    </thead>
    <tbody>
</div>
<?php
$query = "SELECT * FROM tbl_appointment WHERE h_id = $_SESSION[hospital]";

$result = mysqli_query($con,$query);
foreach($result as $apid){
echo"<tr>";
echo "<td>$apid[Id]</td>";
echo "<td>$apid[PatientName]</td>";
echo "<td>$apid[Contact]</td>";
echo "<td>$apid[Email]</td>";
echo "<td>$apid[Date]</td>";
echo "<td>$apid[Time]</td>";
echo "<td>$apid[Category]</td>";
echo "<td>$apid[VaccineName]</td>";
echo "<td>$apid[Status]</td>";

echo "<td>";
       
if($apid['Status']==1){
    echo "<a href='rejectappointment.php?id=$apid[Id]'>
    <button class='deactive-button'>Reject</button>
    </a>"; 

}else{
    echo "<a href='approveappointment.php?id=$apid[Id]'>
    <button class='active-button'>Approve</button>
    </a>";
} 

echo "<td>
                
<button class='update-button'><a href='uploadresults.php?username=$apid[PatientName]&contact=$apid[Contact]&date=$apid[Date]'>Update</a></button>

</td>";            
             

"</td>";
}
?>