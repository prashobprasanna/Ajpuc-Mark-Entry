<?php
extract($_REQUEST);
include("connection.php");
  // $Cust_Id=$_SESSION['Cust_Id'];

   $sql="delete from tblcustomer where Cust_Id=$Cust_Id";

   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header('location: clients.php');
   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>