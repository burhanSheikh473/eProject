<?php

include("../connection.php");
            
$_GET['identity'];
 $_GET['patientname'];
 $_GET['patientcontact'];
$_GET['vaccinestatus'];
 $_GET['testresult'];

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
    /* background-color:lightblue; */
}

textarea {
  resize: vertical;
  height: 90px;
}

input[type="submit"] {
  background-color: #05254d ;
  margin-top:5px;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #ed1c24;
  color: #fff;
     transition: ease-in all 0.5s !important;
}
</style>
<body>
    
    <div class="sidebar">
        <div class="logo">
            <h1>COVID CARE</h1>
        </div>
        <hr>
            <ul class="main">
                
            <li>
                    <a href="./resultstatus.php" >
                        <i class="glyphicon glyphicon-circle-arrow-left"></i>
                        <span>Back</span>
                    </a>
                </li>
                
            </ul>
        </div>
        
        <div class="main-content">
            <div class="header">
                <div class="title">
                    <h1>My Dashboard</h1>
                       <h4> CovidCare (Update Result)</h4>
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
                <input type="text" name="vstatusis" value="<?php echo $_GET['vaccinestatus'];?>" >

                <label for="">Password</label>
                <input type="text" name="tresultis" value="<?php echo $_GET['testresult'];?>">
                
      
                <input type="submit" name="btnupdate" value="Update Data">
            </form>

        </div>
    </div>

    <?php
            
            
        if(isset($_POST['btnupdate'])){
        $pid = $_POST['idis'];
        $pname = $_POST['pnameis'];
        $pcontact = $_POST['pcontactis'];
        $status = $_POST['vstatusis'];
        $result = $_POST['tresultis'];
       
       $query = "UPDATE tbl_status SET PatientName='$pname' , PatientContact= '$pcontact', VaccineStatus='$status', TestResult='$result' WHERE Id=$pid"; 

       $result = mysqli_query($con,$query);
       
       if($result){
        echo "<script>
           window.location.href='resultstatus.php';
        </script>";
       }
    }
    ?>


    </body>
</html>

