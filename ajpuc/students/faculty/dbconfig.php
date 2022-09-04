<?php
if (session_id() == "")
{
session_start();
}    
$servername = "localhost";
$username = "kvgenggco_admin";
$password = "Geleyageleya";

$dbname2="kvgenggco_admin";
// Create connection

$con2 = new mysqli($servername, $username, $password, $dbname2);
// Check connection
if ($con2->connect_error) {
    die("Connection failed: " . $con2->connect_error);
} 
?>