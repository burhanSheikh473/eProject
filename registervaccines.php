<?php
include("connection.php");
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
    input {
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
    <h1>VACCINE REGISTRATION</h1>
<input type="text" placeholder="Enter Name" name="vname" required pattern="[A-Za-z\s]{3,}"><br><br>
<input type="text" placeholder="Enter Code" name="vcode" required ><br><br>

<input type="submit" value="Register Vaccine" name="btnregister">
    </form>
    </div>
</body>
<?php
if(isset($_POST['btnregister'])){
    $name = $_POST['vname'];
    $code = $_POST['vcode'];
    $query = "INSERT INTO tbl_vaccines(VaccineName,VaccineCode)VALUES('$name','$code')";
    $result = mysqli_query($con,$query);
    if($result){

        echo "<script>
        alert('Vaccine register Successfully');
        window.location.href='vaccinationdetails.php';
        
        </script>";
    
      }
}
?>
</html>