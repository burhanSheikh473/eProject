<?php include("connection.php");

?>
<?php
session_start();
if(isset($_POST['btnlogin'])){
   $email = $_POST['uemail'];
   $password = $_POST['upassword'];

 $query = "SELECT * FROM tbl_patient WHERE Email='$email' && Password='$password'";
     
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0)
      {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['U_id'] = $row['Id'];
      $_SESSION['U_name'] = $row['Name'];
      $_SESSION['U_con'] = $row['Contact'];
      $_SESSION['U_email'] = $row['Email'];
      $_SESSION['U_pass'] = $row['Password'];

   
      }

      $login_query = mysqli_num_rows(mysqli_query($con,$query));
      if($login_query == false){

         $error[] = 'incorrect email or password!';

}

if($login_query){
   $check_login = mysqli_fetch_assoc(mysqli_query($con,$query));

   if($check_login['Status']==1){
      $_SESSION['user_email'] = $email;
   }
   if($check_login['Status']==1){
       echo "<script>
       alert('Welcome  $email');
       window.location.href = 'index.php';
       </script>";
   }
   elseif($check_login['Status']==0){
       echo " <script>
       alert('Wait For ADMIN Approval');
   </script>";
}
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Bootstrap CSS link -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
               @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: crimson;
}

.form-container{
   height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   /* background: #eee; */
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.2);
   background: #fff;
   text-align: center;
   width: 500px;
   position: relative;
}

.form-container form h1{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   /* color:#333; */
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   /* font-size: 17px; */
   margin:8px 0;
   border:1px solid #ccc;
   /* background: #eee; */
   /* border-radius: 5px; */
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #0d42ff;
   color:#fff;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: #406aff;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:#ed1c24;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: #0d42ff;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
.form-container form img{
   fill: blue;
}
.check{
   display: flex;
   justify-content: flex-start;
   width: 20px;
   height: 20px;
}
.fa-eye{
   position: absolute;
   top: 48%;
   right:7%;
   cursor: pointer;
   /* color:#ccc; */
   font-size:20px;
}
.pass-icon{
   position: absolute;
   top: 49%;right:6%;
   width: 24px;
   cursor: pointer;
}
.fa-x{
   position: absolute;
   top: 5%;right: 4%;
   width: 25px;
   cursor: pointer;
   color: #333;
   font-size: 25px;
   font-weight: bold;
   transition: 0.3s ease;
}
.fa-x:hover{
   transform: scale(1.1);
}
.btn{
   background:#05254d !important;
   color: #fff;
   cursor: pointer;
   font-size:17px;
}
.btn:hover{
   background: #ed1c24 !important;
     color: #fff;
     transition: ease-in all 0.5s !important;
}
       
       
   
    </style>
</head>
<body>

        <div class="form-container">
        <form method="post" >
        <h1>Patient Login Form</h1>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
};
?>
         
                <input type="email" name="uemail" id="uname" placeholder="Enter Patient Email" required>
        
                <input type="password" name="upassword" id="password" placeholder="Enter Patient Password" required>
      
            <input type="submit" name="btnlogin" class="btn" value="Login Now">
            
               <p> If Patient don't have an account? <br> <a href="registeruser.php" class="text-primary">Create Account</a></P>
           
        </form>
    </div>





    <!-- Bootstrap JS and jQuery (optional for certain features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

