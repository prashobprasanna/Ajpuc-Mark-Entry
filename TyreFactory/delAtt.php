<?php
extract($_REQUEST);
include("connection.php");
  // $itemid=$_SESSION['Emp_Id'];

   $sql="delete from tblattendence where attendence_Id=$order_Id";

   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header('location: attendence.php');
   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   header('location: attendence.php');
   ?>