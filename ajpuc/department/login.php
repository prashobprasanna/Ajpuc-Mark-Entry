<?php
include('dbconfig.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * from faculty where Email_ID='$email' and password='$pwd'";
    if($res=$con->query($sql)){
        header('location : dashboard.php');
    }
}