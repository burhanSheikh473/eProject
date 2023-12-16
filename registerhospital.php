<?php
include("connection.php");
?>
<?php
if (isset($_POST['btnregister'])) {

   $name = $_POST['hname'];
   $contact = $_POST['hcontact'];
   $email = $_POST['hemail'];
   $address = $_POST['haddress'];
   $password = $_POST['hpassword'];

   $select = " SELECT * FROM tbl_hospital WHERE Email = '$email' ";

   $result = mysqli_query($con, $select);

   if (mysqli_num_rows($result) == 1) {

      $error[] = 'user already exist!';

   } else {

      $insert = "INSERT INTO tbl_hospital(Name, Contact ,Email,Address, Password) VALUES('$name','$contact','$email', '$address','$password')";
      mysqli_query($con, $insert);
      header('location:hospitalpanel.php');
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style2.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

   <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

      * {
         font-family: 'Poppins', sans-serif;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         outline: none;
         border: none;
         text-decoration: none;
      }

      .container {
         min-height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 20px;
         padding-bottom: 60px;
      }

      .container .content {
         text-align: center;
      }

      .container .content h3 {
         font-size: 30px;
         color: #333;
      }

      .container .content h3 span {
         background: crimson;
         color: #fff;
         border-radius: 5px;
         padding: 0 15px;
      }

      .container .content h1 {
         font-size: 50px;
         color: #333;
      }

      .container .content h1 span {
         color: crimson;
      }

      .container .content p {
         font-size: 25px;
         margin-bottom: 20px;
      }

      .container .content .btn {
         display: inline-block;
         padding: 10px 30px;
         font-size: 20px;
         background: #333;
         color: #fff;
         margin: 0 5px;
         text-transform: capitalize;
      }

      .container .content .btn:hover {
         background: crimson;
      }

      .form-container {
         height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 20px;
         padding-bottom: 60px;
         /* background: #eee; */
      }

      .form-container form {
         padding: 20px;
         border-radius: 5px;
         box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
         background: #fff;
         text-align: center;
         width: 500px;
         position: relative;
      }

      .form-container form h1 {
         font-size: 30px;
         text-transform: uppercase;
         margin-bottom: 10px;
         /* color:#333; */
      }

      .form-container form input,
      .form-container form select {
         width: 100%;
         padding: 10px 15px;
         /* font-size: 17px; */
         margin: 8px 0;
         /* background: #eee; */
         border: 1px solid #ccc;
         /* border-radius: 5px; */
      }

      .form-container form select option {
         background: #fff;
      }

      .form-container form .form-btn {
         background: #0d42ff;
         color: #fff;
         text-transform: capitalize;
         font-size: 20px;
         cursor: pointer;
      }

      .form-container form .form-btn:hover {
         background: #406aff;
         color: #fff;
      }

      .form-container form p {
         margin-top: 10px;
         font-size: 20px;
         color: #333;
      }

      .form-container form p a {
         color: #ed1c24;
      }

      .form-container form .error-msg {
         margin: 10px 0;
         display: block;
         background: #0d42ff;
         color: #fff;
         border-radius: 5px;
         font-size: 20px;
         padding: 10px;
      }

      .form-container form img {
         fill: blue;
      }

      .check {
         display: flex;
         justify-content: flex-start;
         width: 20px;
         height: 20px;
      }

      .fa-eye {
         position: absolute;
         top: 48%;
         right: 7%;
         cursor: pointer;
         /* color:#ccc; */
         font-size: 20px;
      }

      .pass-icon {
         position: absolute;
         top: 49%;
         right: 6%;
         width: 24px;
         cursor: pointer;
      }

      .fa-x {
         position: absolute;
         top: 5%;
         right: 4%;
         width: 25px;
         cursor: pointer;
         color: #333;
         font-size: 25px;
         font-weight: bold;
         transition: 0.3s ease;
      }

      .fa-x:hover {
         transform: scale(1.1);
      }

      .btn {
         background: #05254d !important;
         color: #fff;
         cursor: pointer;
         font-size: 17px;
      }

      .btn:hover {
         background: #ed1c24 !important;
         color: #fff;
         transition: ease-in all 0.5s !important;
      }
   </style>
</head>

<body>
   <!-- sidebar start -->
   <?php
   require_once('sidebar.php');
   ?>
   <!-- sidebar end -->


   <!-- <li class="logout">
                    <a href="./adminlogin.php">
                        <i class="glyphicon glyphicon-off"></i>
                        <span>Logout</span>
                    </a>
                </li> -->
   </ul>
   </div>

   <div class="form-container">
      <form method="post">
         <h1>HOSPITAL REGISTRATION</h1>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         }

         ?>
         <input type="text" placeholder="Enter Hospital Name" name="hname" required pattern="[A-Za-z\s]{3,}"> <br><br>
         <input type="number" placeholder="Enter Hospital Contact" name="hcontact" required pattern="[0-9]{11}"><br><br>
         <input type="email" placeholder="Enter Hospital Email" name="hemail"
            requiredpattern="[a-z _\-\.]+[0-9]+[@][a-z]+[\.][a-z]{2,3}"><br><br>
         <input type="text" placeholder="Enter Hospital Address" name="haddress" required><br><br>
         <input type="password" placeholder="Enter Hospital Password" name="hpassword" required
            pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"><br><br>
         <input type="submit" value="Register Now" name="btnregister" id="form-btn">
      </form>
   </div>
</body>

</html>