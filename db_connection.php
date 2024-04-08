<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "test";




$mysql = mysqli_connect("localhost","root","","test");

    if(mysqli_connect_errno()){
        echo "Failed to connect " . mysqli_connect_errno();
        exit();
    }


  
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
