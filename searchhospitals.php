<?php
include("connection.php");
session_start();
  include_once("navbar2.php");
$query = "SELECT * FROM tbl_hospital";
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
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<style>
        body {
            /* padding-top: 50px; */
            padding-bottom: 50px;
            background-image: url('images/PaxlovidCovidGetty.jpg'); Path to your image
            background-size: cover;
            background-position: center;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 90vh;
            margin: 0;
        }

        

        .container {
            position: relative;
            padding: 10px;
            margin: auto;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 0 20px rgba(0, 0, 0,.2);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8); 
        }
        .container h2{
            text-transform: uppercase;
        }
        .container table th{
            background-color:#05254d;
        }
        .container table a{
            background-color: #05254d !important;
            border: 0;
        }
        .container table a:hover{
    transition: ease-in all 0.5s !important;
    color: #fff;
    background-color: #ed1c24 !important;
}
   </style>
<body>
    
<div class="container mt-4">
    <h2>Registered Hospitals</h2>
    <div class="table-responsive">
        <table id="hospitalTable" class="table table-bordered shadow-sm rounded">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Contact']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td>
                            <a href="appointment.php?hospital=<?php echo urlencode($row['Id']); ?>"
                               class="btn btn-primary">Appointment</a>
                            <!-- <a href="covid_test.php?hospital=<?php echo urlencode($row['Name']); ?>"
                               class="btn btn-success mt-2">COVID Test</a>    -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!-- jQuery and Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#hospitalTable').DataTable();
    });
</script>

</body>
</html