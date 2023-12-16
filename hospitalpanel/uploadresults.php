<?php
include("../connection.php");
session_start();
$name = $_GET['username'];
$contact = $_GET['contact'];
$date = $_GET['date'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    
    <style>
    .form-container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
}
.form-container h1 {
        text-align: center;
        color: #333;
        margin-top: 0;
        margin-bottom: 30px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    form {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 50%;
        /* height: 30%; */
    }
    input,select {
        width: 100%;
        padding: 15px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        /* border-radius: 4px; */
        box-sizing: border-box;
    }
input:focus{
    border-color:#05254d;
    outline:0;
}
    input[type="submit"] {
        background-color: #05254d;
        color: #fff;
        padding: 15px;
        border: none;
        cursor: pointer;
        font-size:18px;
        font-weight:bold;
    }
    input[type="submit"]:hover {
        background-color: #ed1c24;
        transition: ease-in all 0.5s;
        color: #fff;
    }
    </style>
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <h1>COVID CARE</h1>
        </div>
        <hr>
            <ul class="main">
                
                <li>
                    <a href="../hospitalpanel.php" >
                    <i class="fa-solid fa-arrow-right fa-rotate-180"></i>
                        <span>Back</span>
                    </a>
                </li>
                
                <!-- <li class="logout">
                    <a href="./adminlogin.php">
                        <i class="glyphicon glyphicon-off"></i>
                        <span>Logout</span>
                    </a>
                </li> -->
            </ul>
        </div>

<div class="form-container">
    <form  method="post">
    <h1>Update Results Form</h1>
<input type="text"  name="pname" value="<?php echo $name?>" readonly  ><br><br>
<input type="number"  name="pcontact" value="<?php echo $contact?>" readonly ><br><br>
<!-- <input type="text" placeholder="Enter Vaccine Status " name="pstatus" required ><br><br> -->
<select name="pstatus" id="">
<option value="" disabled selected>Select a Result</option>
    <option value="Vaccinated">Vaccinated</option>
    <option value="Not-Vaccinated">Not-Vaccinated</option>
</select>
<!-- <input type="text" placeholder="Enter Test Result" name="ptest" required ><br><br> -->
<select name="ptest" id="">
    <option value="" disabled selected>Select a Result</option>
    <option value="Positive">Positive</option>
    <option value="Negative">Negative</option>
</select>
<input type="text" value = "<?php echo $date ?>" name="pdate" readonly ><br><br>
<input type="submit" name="btninsert" value="Update Status">
    </form>
    </div>
</body>
<?php
if(isset($_POST['btninsert'])){
    $name = $_POST['pname'];
    $contact = $_POST['pcontact'];
    $status = $_POST['pstatus'];
    $test = $_POST['ptest'];
    $date = $_POST['pdate'];
    $query = "INSERT INTO tbl_status(PatientName,PatientContact,VaccineStatus,TestResult,TestDate)VALUES('$name',   '$contact','$status','$test','$date')";
    $result = mysqli_query($con,$query);
    if($result){

        echo "<script>
        alert('Data Updated Successfully');
        window.location.href='appointmentdetails.php';
        
        </script>";
    
      }}
?>
</html>