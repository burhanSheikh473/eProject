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
    <title>View Patient Status</title>
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
            <h1>COVID CARE</h1>
        </div>
        <hr>
        <ul class="main">
            <li>
                <a href="./adminpanel.php">
                    <i class="glyphicon glyphicon-circle-arrow-left"></i>
                    <span>Back</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="title">
                <h2>View Patient Status</h2>
                <h3><?php echo $aname ?></h3>
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
                        <th>Detailed Status</th>
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
                            echo "Active";
                        } else {
                            echo "Deactive";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
