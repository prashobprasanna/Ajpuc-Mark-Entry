<?php
extract($_REQUEST);
include("connection.php");

   $sql="delete from tbltyresize where size_Id=$size_Id";
   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header("location:sizes.php");

   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>