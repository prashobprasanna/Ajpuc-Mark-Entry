<?php
$serverame = "localhost";
$username = "root";
$password = "";
$db_name = "student_db";
$con = mysqli_connect($serverame, $username, $password, $db_name)or die("connection failed");
if(isset($con)){
    echo "Connection was successful";
}



?>