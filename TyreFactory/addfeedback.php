<?php
  include "connection.php";

  if(isset($_POST['addNew']))
  {
    $customer=$_POST['cusid'];
    $billid=$_POST['billid'];
	$date=$_POST['date'];
	$comment=$_POST['comment'];
    $sql="INSERT into tblfeedback(Cust_Id,bill_Id,feedback_Date,comment)values('$customer','$billid','$date','$comment')";
    if($con->query($sql))
    {

        $_SESSION['success']='Feedback added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: feedback.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>