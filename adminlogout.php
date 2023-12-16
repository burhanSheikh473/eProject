<?php
session_start();
unset( $_SESSION['Admin_name']);
header("location:index.php");
?>