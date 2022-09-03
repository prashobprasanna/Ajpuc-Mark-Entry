<?php
  include "connection.php";

  if(isset($_POST['addstock']))
  {
   // $itemName=$_POST['stockid'];
    $itemid=$_POST['itemid'];
    $quantity=$_POST['quantity'];
    $sql="INSERT into tblstock(itemId,Quantity) values($itemid,$quantity)";
    if($con->query($sql))
    {

        
        $_SESSION['success']='stock added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: stock.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>

 