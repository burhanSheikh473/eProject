<?php
include("connection.php");
?>
<?php
if (isset($_POST['btnregister'])) {

    $name = $_POST['aname'];
    $email = $_POST['aemail'];
    $password = $_POST['apassword'];

    $select = " SELECT * FROM tbl_admin WHERE Email = '$email' ";

    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) == 1) {

        $error[] = 'user already exist!';

    } else {

        $insert = "INSERT INTO tbl_admin(Name,Email, Password) VALUES('$name','$email','$password')";
        mysqli_query($con, $insert);
        header('location:adminpanel.php');
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
        .form-container {
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

        input:focus {
            border-color: #05254d;
            outline: 0;
        }

        input[type="submit"] {
            background-color: #05254d;
            color: #fff;
            padding: 15px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #ed1c24;
            transition: ease-in all 0.5s;
            color: #fff;
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
            <h1>ADMIN REGISTRATION</h1>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }

            ?>
            <input type="text" placeholder="Enter Name" name="aname" required pattern="[A-Za-z\s]{3,}"><br><br>
            <input type="email" placeholder="Enter Email" name="aemail" required
                pattern="[a-z _\-\.]+[0-9]+[@][a-z]+[\.][a-z]{2,3}"><br><br>
            <input type="password" placeholder="Enter password" name="apassword" required
                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"><br><br>
            <input type="submit" value="Register Now" name="btnregister">
        </form>
    </div>
</body>

</html>