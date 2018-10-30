<?php 

session_start();
unset($_SESSION['username']);
header("location:index.php?msg=You Have Successfuly Logout.");
 ?>