<?php include ("connection.php");
session_start();
if(!isset($_SESSION['user_email'])){
   
    echo "<script>
  
    window.location.href = 'loginuser.php';
</script>";
  
}  
include_once("navbar2.php");
$hid = $_GET['hospital'];
$pname = $_SESSION['U_name'];
// $query = "SELECT * FROM tbl_hospital WHERE id =  " ;
// $result = mysqli_query($con, $query);
// $patient = mysqli_fetch_assoc($result);

// $username = $patient['Name'];
// $email = $patient['Email'];
// $contact = $patient['Contact'];

// $hospitalName = "";

// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
//     $hospitalId = $_GET['id'];

//     $query = "SELECT * FROM tbl_hospital WHERE id = $hospitalId";
//     $result = mysqli_query($con, $query);
//     $hospital = mysqli_fetch_assoc($result);

// $username1 = $hospital['Name'];
// }
// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hospital'])) {
//     $hospitalName = $_GET['hospital'];}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment For Vaccine</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/cases2.png');
            background-size: cover;
            background-position: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        h1 {
            text-align: center;
        }
</style>
</head>
<body>
<div class="container">
        <h1>Book Appointment For Vaccine</h1>
        <form method="post">
            
            <div class="form-group">
    <input type="text" name="pname" class="form-control" placeholder="<?php echo $pname ?>" > 
</div>
<div class="form-group">
    <input type="text" class="form-control" readonly value="<?php echo $hid?>" name="hname">
</div>

            <div class="form-group">
               <input type="date" class="form-control" name="apdate" min="<?php echo date('Y-m-d', strtotime('+0 day')); ?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your Contact" name="pcontact">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter Your Email" name="pemail" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="apslot" required>
                    <option>----Select Time-----</option>
                    <option value="9-11">9am - 11am</option>
                    <option value="11-01">11am -01am</option>
                    <option value="01-03">01am -03am</option>
                    <!-- Other options -->
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="apcategory" required>
                    <option>----Select Category-----</option>
                    <option value="Covid-19 test">Test</option>
                    <option value="Vaccine">Vaccine</option>
                    <!-- Other options -->
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="apvaccine" required>
                    <option>----Select Vaccine------</option>
                    <?php
                   $query = "SELECT * FROM tbl_vaccines";
                   $result = mysqli_query($con,$query);
                   foreach($result as $vid){
                  echo "<option value='$vid[VaccineName]'>$vid[VaccineName]</option>";
                }?>
                    <!-- Options loaded dynamically from database -->
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Book Appointment" name="btnbook">
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
if(isset($_POST['btnbook'])){
    $id = $_POST['pid'];
    $name = $_POST['pname'];
    $hospital = $_POST['hname'];
    $date = $_POST['apdate'];
    $contact = $_POST['pcontact'];
    $email = $_POST['pemail'];
    $slot = $_POST['apslot'];
    $category = $_POST['apcategory'];
    $vaccine = $_POST['apvaccine'];
    $hid = $_POST['hname'];

    // Assuming tbl_appointment has columns: PatientName, Contact, Email, Date, Time, Hospital, VaccineName
    $query = "INSERT INTO tbl_appointment(PatientName, Contact, Email, Date, Time,Category, Hospital, VaccineName,h_id) 
              VALUES ('$name', '$contact', '$email', '$date', '$slot','$category', '$hospital', '$vaccine','$hid')";
    $result = mysqli_query($con, $query);

    if($result){
        echo "<script>
            alert('Your Request For Vaccination Has Been Submitted');  
            window.location.href='index.php';
            </script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
