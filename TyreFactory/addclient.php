<?php
if( session_id()=='')
session_start();
  include "connection.php";
  // extract($_REQUEST);
  if(isset($_POST['addnew']))
  {
    $name=$_POST['cusName'];
    $address=$_POST['cusAdd'];
    $contact=$_POST['cusPhone'];
    $email=$_POST['cusmail'];
    $pass=$_POST['cuspass'];
    $desc=$_POST['cusdesc'];
    $profile=$_POST['cusprofile'];
    $sql="INSERT into tblcustomer(Cust_Name,Cust_Address,Cust_Phone,Cust_Email,Cust_Password,Cust_Desc,Cust_Img) values('$name','$address','$contact','$email','$pass','$desc','$profile')";
    if($con->query($sql))
    {

        $_SESSION['success']='Client added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: clients.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>