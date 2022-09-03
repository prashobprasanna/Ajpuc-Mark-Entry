<?php
  include "connection.php";
  if( session_id()=='')
  session_start();
  if(isset($_POST['addInvoice']))
  {
    $itemName=$_POST['itemName'];
    $itemid=$_POST['itemid'];
    $quantity=$_POST['quantity'];
    $supplier=$_POST['supplier'];
    $price=$_POST['price'];
    $sql="INSERT into tblinvoice(invoicenumber,itemid,qty,Sup_Id,price) values('$itemName',$itemid,$quantity,$supplier,'$price')";
    if($con->query($sql))
    {

      $sql="update tblstock set  Quantity=Quantity+$quantity where itemId=$itemid";
 
      $result=$con->query($sql);
   
      $_SESSION['success']='INvoice added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: invoice.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>

 