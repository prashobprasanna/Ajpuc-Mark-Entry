<?php
if (session_id() == "")
{
session_start();
}    
$servername = "localhost";
$username = "kvgenggco_admin";
$password = "Geleyageleya";
$dbname = "kvgenggco_".$_SESSION["dbname"];

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
?>