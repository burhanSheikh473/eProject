<?php
include_once("connection.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  

$query = "SELECT * FROM adminregisterhospitals";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register Hospitals</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        body {
            padding-top: 50px;
            padding-bottom: 50px;
            background-image: url('images/PaxlovidCovidGetty.jpg'); Path to your image
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            margin: 0;
        }

        

        .container {
            position: relative;
            padding: 20px;
            margin: auto;
            width: 80%;
            max-width: 1000px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8); 
        }
        
   </style>
<body>
<div class="container mt-4">
    <h2>Registered Hospitals</h2>
    <div class="table-responsive"> <!-- Add responsiveness to the table for small screens -->
        <table class="table table-bordered shadow-sm rounded">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Number</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <a href="appointment.php?hospital=<?php echo urlencode($row['name']); ?>"
                               class="btn btn-primary">Appointment</a>
                            <a href="covid_test.php?hospital=<?php echo urlencode($row['name']); ?>"
                               class="btn btn-success mt-2">COVID Test</a>   
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

