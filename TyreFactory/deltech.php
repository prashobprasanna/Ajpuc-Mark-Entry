<?php
extract($_REQUEST);
include("connection.php");
  // $itemid=$_SESSION['Emp_Id'];

   $sql="delete from tblemployee where Emp_Id=$Emp_Id";

   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header('location: technician.php');
   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>