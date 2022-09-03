<?php
extract($_REQUEST);
include("connection.php");
  // $itemid=$_SESSION['itemid'];

   $sql="delete from tblinvoice where invoice_id=$invoice_id";

   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header("location:invoice.php");
   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>