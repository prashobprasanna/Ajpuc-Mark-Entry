<?php
extract($_REQUEST);
include("connection.php");
  // $service_id=$_SESSION['service_id'];

   $sql="delete from tblservice where service_id=$service_id";
   $result=$con->query($sql);

   if($result==true)
   {
     echo "<script> alert('Record deleted');</script>";
     header('location: services.php');
   }
   else {
   echo "<script> alert('Could not delete the record');</script>";
   }
   ?>