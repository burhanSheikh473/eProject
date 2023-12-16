<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COVID Test & Vaccination Management System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
 /* Dropdown styles */
 .navbar-nav .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      z-index: 1000;
      min-width: 10rem;
      padding: 5px 10px;
      margin: 0;
      list-style: none;
      background-color: #fff;
      border: 1px solid rgba(0, 0, 0, 0.15);
      border-radius: 0.25rem;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu li {
      margin-right:10px ;
    }

    .dropdown-item {
      display: block;
      width: 100%;
      padding: 0.25rem 1.5rem;
      clear: both;
      font-weight: 400;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
    }
    .bg{
      background-color:#05254d;
    }
    .navbar{
      height: 80px;
      margin-bottom: 0;
      /* position: sticky !important;
      top: 0;
      left: 0;
      right: 0; */
    }
    .navbar .navbar-item a{
      color:#fff;
    }
    .fa-sign-out-alt{
      font-size:20px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg">
  <a class="navbar-brand ms-5" href="#">COVID System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
    <?php
                                if(!isset($_SESSION['user_email'])){
                                    echo "  <div class='dropdown'>
                                    <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>Sign in</a>
                                    <ul class='dropdown-menu'>
                                       <li> <a href='loginuser.php' class='dropdown-item'>User-Login</a> </li>
                                       <li> <a href='hospitallogin.php' class='dropdown-item'>Hospital-Login</a> </li>
                                       <li> <a href='adminlogin.php' class='dropdown-item'>Admin-Login</a> </li>
                                    </ul>
                                </div>";
                                }

                                if(isset($_SESSION['user_email'])){
                                  echo "<div class='dropdown'>
                                  <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span><i class='fa-solid fa-user fs-6'></i></span></a>
                                  <ul class='dropdown-menu'>
                                  <li> <a href='logoutpatient.php' class='dropdown-item'>Logout</a> </li> 
                                  <li> <a href='patientprofile.php' class='dropdown-item'>Patient Dashboard</a> </li> 
                                  </ul>
                                  </div>"; 
               }
                              //   if(isset($_SESSION['user_email'])){
                              //     echo "
                              //     <li><a href='logoutpatient.php' class='dropdown-item'><i class='fas fa-sign-out-alt'></i></a> </li> ;
                              //     <li><a href='patientprofile.php' class='dropdown-item'>Profile</a> </li> ";
                              // }
              ?>
      <li class="nav-item justify-content-spacebetween">
          <a class="nav-link active fs-6" class="active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link fs-6" href="about.php" >About</a>
      </li>
      <li class="nav-item">
          <a class="nav-link fs-6" href="news.php">News</a>
      </li>
      <li class="nav-item">
           <a class="nav-link fs-6" href="contact.php">Contact</a>
      </li>
      <!-- <li class="nav-item">
          <a class="nav-link fs-6" href="userprofile.php">Find Results</a>
      </li> -->
      <li class="nav-item">
          <a class="nav-link fs-6" href="searchhospitals.php"> Search Hospitals</a>
      </li>
   
    </ul>
  </div>
</nav>
<!-- <div class="search-results"></div> -->
<!-- Main content area below the navbar -->
<div class="main-content">
  <!-- Your existing content -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function () {
    $('#search').keyup(function () {
      var searchTerm = $(this).val();

      if (searchTerm !== '') {
        $.ajax({
          url: 'search_hospitals.php',
          method: 'GET',
          data: { search: searchTerm },
          success: function (data) {
            if (data.trim() !== '') {
              $('.search-results').html(data).addClass('active');
            } else {
              $('.search-results').removeClass('active');
            }
          },
          error: function (xhr, status, error) {
            console.error(error);
          }
        });
      } else {
        $('.search-results').removeClass('active').html('');
      }
    });
  });
</script>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
