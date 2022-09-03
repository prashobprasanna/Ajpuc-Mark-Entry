<?php
extract($_REQUEST);
include("connection.php");

   $sql="delete from tblvehicletype where vehicletype_id=$vehicletype_id";
   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header("location: vehicletype.php");

   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>