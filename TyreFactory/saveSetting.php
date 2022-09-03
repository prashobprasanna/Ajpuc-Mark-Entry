<?php
  include "connection.php";
  // extract($_REQUEST);
  if(isset($_POST['saveSettings']))
  {
    $shopName=$_POST['shopName'];
    $owner=$_POST['owner'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $website=$_POST['website'];
    
    $sql="INSERT into tblcustomer(settingIdshopName,owner,address,email,contact,website) 
    values(1,'$shopName','$owner','$contact','$address','$email','$contact','$website')";
    if($con->query($sql))
    {

        $_SESSION['success']='Added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: settings.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>