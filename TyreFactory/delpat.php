<?php
extract($_REQUEST);
include("connection.php");

   $sql="delete from tbltyrepattern where pattern_Id=$pattern_Id";
   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header("location:patterns.php");

   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>