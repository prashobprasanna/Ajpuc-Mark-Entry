<?php
  include "connection.php";

  if(isset($_POST['addAmt']))
  {
    $orderid=$_POST['orderid'];
    $itemid=$_POST['itemid'];
   // $amt=$_POST['amtt'];
    $qty=$_POST['qtt'];
      $sql1=mysqli_query($con,"select itemAmt from tblitem where itemId=$itemid");
      if($result= mysqli_fetch_assoc($sql1))
      $amt=$result['itemAmt'];
      $amt=$amt*$qty;
      // check stock
      $sql1=mysqli_query($con,"SELECT Quantity FROM tblstock where itemId=$itemid");
      if($result1= mysqli_fetch_assoc($sql1))
      $sqty= $result1['Quantity'];
        $sqty=$sqty-$qty;
  if($sqty>5)
  {
    
    $sql="INSERT into tblbilldetails(workorderid,itemid,qty,price) values('$orderid','$itemid',$qty,$amt)";
    if($con->query($sql))
    {
      

      $sql="update tblstock set  Quantity=Quantity-$qty where itemId=$itemid";
 
      $result=$con->query($sql);

        $_SESSION['success']='Bill added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: payment.php');

  }
  else
  {
    $_SESSION['exceed']="yes";
    header('location: stock.php');
  }
}
  else
  {
	header('location: index.php');
  }
 
?>

 