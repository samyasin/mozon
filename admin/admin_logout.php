<?php 

session_start();

unset($_SESSION['admin_id']);


header("location:admin_login.php");

 ?>