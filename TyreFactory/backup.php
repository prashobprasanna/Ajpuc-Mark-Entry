<?php 
 
    // include first the function in your other file
    include "dbback.php";
 
    //Database Credentials Vairables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "factorydb";
 


   // $serverame = "localhost";
  //  $username = "root";
   // $password = "";
  //  $db_name = "factorydb";


    // Initiating the backup database function
    backDb($servername, $username, $password, $db_name);
?>