<?php include ("connection.php");
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include_once("navbar2.php");

$query = "SELECT * FROM tbl_patient WHERE id = " . $_SESSION['patient_session'];
$result = mysqli_query($con, $query);
$patient = mysqli_fetch_assoc($result);

$username = $patient['Name'];
$email = $patient['Email'];
$contact = $patient['Contact'];

$hospitalName = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $hospitalId = $_GET['id'];

    $query = "SELECT * FROM tbl_hospital WHERE id = $hospitalId";
    $result = mysqli_query($con, $query);
    $hospital = mysqli_fetch_assoc($result);

$username1 = $hospital['Name'];
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hospital'])) {
    $hospitalName = $_GET['hospital'];}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for COVID-19 Test / Vaccination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  /* Styling for the body */
  body {
    background-image: url('images/cases2.png'); /* Path to your image */
    background-size: cover;
    background-position: center;
    margin: 0;
    padding: 0;
  }

  /* Styling for the form container */
  .content {
    position: relative;
    padding: 20px;
    margin: auto;
    width: 50%;
    max-width: 500px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.8); /* To add a semi-transparent white background for the form */
  }

  /* Center the form elements */
  .content form {
    text-align: center;
  }

  .content form input{
    text-align: center;
  }

  /* Style the form fields and button */
  .content form .form-control {
    margin-bottom: 15px;
  }
</style>
<body>

<div class="container-fluid position-relative  d-flex p-0 mt-2">
<!-- Content Start -->
    <div class="content">
    <div class="container mt-5">
        <h2>Request for COVID-19 Test / Vaccination</h2>
        <form  method="post">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name"
                     value="<?php echo isset($username) ? $username : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" 
                 value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            <div class="form-group">
               <input type="text" class="form-control" name="hospital" 
               value="<?php echo isset($username1) ? $username1 : '';echo $hospitalName; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" 
                value="<?php echo isset($_SESSION['patient_contact']) ? $_SESSION['patient_contact'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="preference">Request Type:</label>
                <select class="form-control" id="preference" name="preference" required>
                    <option value="COVID-19 Test">COVID-19 Test</option>
                    <option value="Vaccination">Vaccination</option>
                </select>
            </div>
            <div class="form-group">
                <label for="additional_notes">Additional Notes:</label>
                <textarea class="form-control" id="additional_notes" name="additional_notes"></textarea>
            </div>
            <button type="submit" name="btninsert" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
    </div>
    </div>
    <?php
    if(isset($_POST['btninsert'])){
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $hospital = $_POST["hospital"];
    $phone = $_POST["phone"];
    $preference = $_POST["preference"];
    $additional_notes = $_POST["additional_notes"];

    // Your SQL query to insert data into the database
    $query = "INSERT INTO patient_requests (full_name, email,hospital_name, phone, preference, additional_notes) 
    VALUES ('$full_name', '$email', '$hospital', '$phone', '$preference', '$additional_notes')";

    $result = mysqli_query($con, $query);

    if ($result) {
        // Data successfully inserted
        echo "<script>alert('Request sent successfully!')
        window.location.href='index.php';</script>";
    } else {
        // Error occurred while inserting data
        echo "<script>alert('Failed to send request. Please try again.')</script>";
    }
}
?>

</body>
</html>
