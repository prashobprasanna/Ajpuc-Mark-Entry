<?php
  include "connection.php";
  // extract($_REQUEST);
  if(isset($_POST['addPayment']))
  {
    $orderid1=$_POST['orderid'];

     $orderid=substr($orderid1,0,4);
    $len1=strlen($orderid1);
    $custid=$_POST['custid'];
    $amt=trim(substr($orderid1,4,$len1));
    $status=$_POST['status'];
    $billdate=$_POST['billdate'];
    $paiddate=$_POST['paiddate'];
    $remark=$_POST['remark'];
    $sql="INSERT into tblbill(order_Id,Cust_Id,billAmt,billStatus,billDate,paidDate,remark) values($orderid,$custid,'$amt','$status','$billdate','$paiddate','$remark')";
    //$sql="INSERT into tblbill(order_Id,Cust_Id,billAmt,billStatus,billDate,paidDate,remark) values(16,2,5444,'paid','2022-05-06','2022-08-05','abcd')";
    if($con->query($sql))
    {

        $_SESSION['success']='Payment details added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: payment.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>