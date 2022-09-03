<?php
extract($_REQUEST);
include("connection.php");
  // $itemid=$_SESSION['itemid'];

   $sql="delete from tblstock where stock_id=$itemId";

   $result=$con->query($sql);

   if($result==true)
   {

     echo "<script> alert('Record deleted');</script>";
     header("location:stock.php");
   }
   else 
   echo "<script> alert('Could not delete the record');</script>";
   ?>