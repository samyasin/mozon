<?php 
/*
$servername = "localhost;
$username = "root";
$password = "";
$connecteddatabase="zubaidy"
*/
$conn = mysqli_connect( "localhost" , "root", "" , "zubaidy");
if(!$conn)
{
	die("Cannot Contact With Server" . $conn->connect_error);
}


 ?>


