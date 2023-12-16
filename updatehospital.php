<?php
include("connection.php");            
$_GET['identity'];
 $_GET['username'];
 $_GET['usercontact'];
$_GET['useremail'];
$_GET['useraddress'];
 $_GET['userpassword'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="./style2.css">
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
    background:#05254d !important;
  margin-top:5px;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
    background: #ed1c24 !important;
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
                    <a href="./hospitalstatus.php" >
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
                       <h4>_CovidCare (Update-Hospital)</h4>
                </div>
               
            </div>
        
        <div class="table">
            <form method="post">
                <label for="">Identity</label>
                <input readonly type="text" name="idis" value="<?php echo $_GET['identity'];?>">

                <label for="">Name</label>
                <input type="text" name="hnameis" value="<?php echo $_GET['username'];?>" >

                <label for="">Contact</label>
                <input type="text" name="hcontactis" value="<?php echo $_GET['usercontact'];?>" >

                <label for="">Email</label>
                <input type="email" name="hemailis" value="<?php echo $_GET['useremail'];?>" >

                <label for="">Address</label>
                <input type="text" name="haddressis" value="<?php echo $_GET['useraddress'];?>" >

                <label for="">Password</label>
                <input type="text" name="hpasswordis" value="<?php echo $_GET['userpassword'];?>">
                
      
                <input type="submit" name="btnupdate" value="Update_Data">
            </form>

        </div>
    </div>

    <?php
            
            
        if(isset($_POST['btnupdate'])){
        $pid = $_POST['idis'];
        $pname = $_POST['hnameis'];
        $pcontact = $_POST['hcontactis'];
        $pemail = $_POST['hemailis'];
        $paddress = $_POST['haddressis'];
        $ppassword = $_POST['hpasswordis'];
       
       $query = "UPDATE tbl_hospital SET Name='$pname',Contact='$pcontact',Email='$pemail', Address='$paddress', Password= '$ppassword' WHERE Id=$pid"; 

       $result = mysqli_query($con,$query);
       
       if($result){
        echo "<script>
           window.location.href='hospitalstatus.php';
        </script>";
       }
    }
    ?>


    </body>
</html>

