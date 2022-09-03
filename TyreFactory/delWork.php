<?php
extract($_REQUEST);
include("connection.php");
  // $itemid=$_SESSION['Emp_Id'];

   $sql="delete from tblworkorder where order_Id=$order_Id";

   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
    
   }
   else 
   echo "<script> alert('Could not delete the record');</script>";

   header('location: work-order.php');
   ?>