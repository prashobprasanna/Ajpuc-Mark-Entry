<?php
if( session_id()=='')
session_start();
  include "connection.php";

  if(isset($_POST['addNew']))
  {
    $itemName=$_POST['itemName'];
    $desc=$_POST['desc'];
    $amt=$_POST['amt'];
    $sql="INSERT into tblitem(itemName,itemDesc,itemAmt) values('$itemName','$desc','$amt')";
    if($con->query($sql))
    {

        $_SESSION['success']='Items added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: items.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>

 