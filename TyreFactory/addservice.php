<?php
  include "connection.php";
  if( session_id()=='')
   session_start();
  if(isset($_POST['addservice']))
  {
    $itemName=$_POST['sname'];
    $desc=$_POST['desc'];
    $sql="INSERT into tblservice(serviceName,Description) values('$itemName','$desc')";
    if($con->query($sql))
    {

        $_SESSION['success']='Service added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: services.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>