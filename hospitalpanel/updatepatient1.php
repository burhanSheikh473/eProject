<?php

include("../connection.php");
            
$_GET['identity'];
 $_GET['patientname'];
 $_GET['patientcontact'];
$_GET['patientemail'];
 $_GET['patientpassword'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="../style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<style>
.table {
  width: 100%;
  margin-top: 8px;
  padding: 15px;
  border: 1px solid #ccc;
  background-color: #f7f7f7;
  border-radius: 5px;
}

label {
  display: block;
  margin-top: 10px;
  font-size:15px;

}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
}
input[type="text"]:hover,
input[type="email"]:hover,
textarea:hover
{
    background-color:lightblue;
}

textarea {
  resize: vertical;
  height: 90px;
}

input[type="submit"] {
  background-color: black;
  margin-top:5px;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: lightblue;
  color:black;
  font-weight:bold;
}
</style>
<body>
    
    <div class="sidebar">
        <div class="logo">
            <h1>Covid Care</h1>
        </div>
            <ul class="main">
                
                <li>
                    <a href="./appointmentdetails.php" >
                        <i class="glyphicon glyphicon-dashboard"></i>
                        <span>Appointment_Details</span>
                    </a>
                </li>
                <li>
                    <a href="./resultstatus.php" >
                    <i class="fa-solid fa-hospital"></i>
                        <span>Test/Vaccine Results</span>
                    </a>
                </li>
                <li>
                    <a href="./index.php" target="_blank" >
                        <i class="glyphicon glyphicon-circle-arrow-left"></i>
                        <span>Back_To_CovidCare</span>
                    </a>
                </li>
                
                <li class="logout">
                    <a href="./index.php">
                        <i class="glyphicon glyphicon-off"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="header">
                <div class="title">
                    <h1>My Dashboard</h1>
                       <h4>_CovidCare (Update-Contact)</h4>
                </div>
                <div class="user-info">
                    <img src="./assets/img/logo.png" alt="">
                </div>
            </div>
        
        <div class="table">
            <form method="post">
                <label for="">Identity</label>
                <input readonly type="text" name="idis" value="<?php echo $_GET['identity'];?>">

                <label for="">Name</label>
                <input type="text" name="pnameis" value="<?php echo $_GET['patientname'];?>" >

                <label for="">Contact</label>
                <input type="text" name="pcontactis" value="<?php echo $_GET['patientcontact'];?>" >

                <label for="">Email</label>
                <input type="email" name="pemailis" value="<?php echo $_GET['patientemail'];?>" >

                <label for="">Password</label>
                <input type="text" name="ppasswordis" value="<?php echo $_GET['patientpassword'];?>">
                
      
                <input type="submit" name="btnupdate" value="Update_Data">
            </form>

        </div>
    </div>

    <?php
            
            
        if(isset($_POST['btnupdate'])){
        $pid = $_POST['idis'];
        $pname = $_POST['pnameis'];
        $pcontact = $_POST['pcontactis'];
        $pemail = $_POST['pemailis'];
        $ppassword = $_POST['ppasswordis'];
       
       $query = "UPDATE tbl_patient SET Name='$pname' , Contact= '$pcontact', Email='$pemail', Password='$ppassword' WHERE Id=$pid"; 

       $result = mysqli_query($con,$query);
       
       if($result){
        echo "<script>
           window.location.href='./userstatus.php';
        </script>";
       }
    }
    ?>


    </body>
</html>

