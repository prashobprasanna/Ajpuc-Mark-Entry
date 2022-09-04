<?php
if (session_id() == "")
{
session_start();
}    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
else{
    echo "Coyg nftgyhuijmko,lp";
}
?>