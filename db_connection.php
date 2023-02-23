<?php
  
// Server name must be localhost
$servername = "localhost";
  
// In my case, user name will be root
$username = "root";
  
// Password is empty
$password = "";

//database name
$dbname="kist_college";
  
// Creating a connection
$conn = mysqli_connect($servername, 
            $username, $password,$dbname,3306);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failure: " 
        . $conn->connect_error);
} 
  

// $conn->close();
?>