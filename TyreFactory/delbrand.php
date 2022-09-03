<?php
extract($_REQUEST);
include("connection.php");

   $sql="delete from tblbrand where company_Id=$company_Id";
   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header("location:brands.php");

   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>